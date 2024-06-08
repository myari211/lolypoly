<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Helpers\GeneralFunction;

class Promo extends Model
{
    use HasFactory;
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_promo';
    protected $keyType = 'string';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'code',
        'image',
        'min_order',
        'discount_type',
        'discount_value',
        'max_discount',
        'start_date',
        'end_date',
        'is_popup',
        'row_status',
        'created_by',
        'updated_by',
    ];

    public function customerPromo(){
        return $this->hasMany(CustomerPromo::class,"promo_id",'id');
    }
    
    public function getDiscValueAttribute(){
        if($this->discount_type == 'P'){
            $res = $this->discount_value.'%';
        } else {
            $res = 'Rp '.GeneralFunction::convertToCurrency($this->discount_value);
        }
        return $res;
    }
}
