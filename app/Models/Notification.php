<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Notification extends Model
{

    use Uuid, SoftDeletes;

    public $incrementing = false;
    protected $table = "10_notification";
    protected $keyType = 'string';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "id",
        "transaction_id",
        "customer_id",
        "keterangan",
        "notif_type",
        "row_status",
        "created_by",
        "updated_by",
    ];


    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id",'id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class,"transaction_id",'id');
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];
}
