<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_product_image';
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
        'product_id',
        'image',
        'as_thumbnail',
        'row_status',
        'created_by',
        'updated_by',
    ];

    public function getImageUrlAttribute($value)
    {
        $path_images = public_path().'/'.$this->image;
        $url_images = url('/').'/'.$this->image;
        $images_default = asset('images/img-default.png');
        if (isset($this->image)) {
            if(file_exists($path_images)) {
                $images_url = $url_images;
            }
            else {
                $images_url = $images_default;
            } 
        } else {
            $images_url = $images_default;
        }
        
        return $images_url;
    }
}
