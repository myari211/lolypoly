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

class Product extends Model
{
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_product';
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
        'brand_id',
        'slug',
        'description',
        'min_stock',
        'stock',
        'weight',
        'price',
        'image',
        'flag',
        'row_status',
        'created_by',
        'updated_by',
    ];

    public function productCategory(){
        return $this->hasMany(ProductCategory::class,"product_id",'id');
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class,"product_id",'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,"brand_id",'id');
    }
    public function productType(){
        return $this->hasMany(ProductType::class,"product_id",'id');
    }
    public function productVariant(){
        return $this->hasMany(ProductVariant::class,"product_id",'id');
    }

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
