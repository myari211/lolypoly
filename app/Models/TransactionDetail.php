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
use App\Helpers\GeneralFunction;

class TransactionDetail extends Model
{
    use Notifiable, Uuid, SoftDeletes;
    // use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    protected $table = '10_transaction_detail';
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
        'transaction_id',
        'product_id',
        'product_type_id',
        'product_variant_id',
        'stock',
        'weight',
        'price',
        'row_status',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, "transaction_id", 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", 'id');
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, "product_variant_id", 'id');
    }
    public function type()
    {
        return $this->belongsTo(ProductType::class, "product_type_id", 'id');
    }
    public function productType(){
        return $this->belongsTo(ProductType::class,"product_type_id",'id');
    }
    public function productVariant(){
        return $this->belongsTo(ProductVariant::class,"product_varian_id",'id');
    }
    public function getProductNameAttribute(){
        $product_name = $this->product->title;
        $product_name .= isset($this->productType) ? ' / '.$this->productType->title : '';
        $product_name .= isset($this->productVariant) ? ' / '.$this->productVariant->title : '';
        return $product_name;
    }
    public function getProductImageAttribute(){
        $images_default = asset('images/img-default.png');
        if (isset($this->product->image)) {
            $path_images = public_path().'/'.$this->product->image;
            $url_images = url('/').'/'.$this->product->image;
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

    public function getProductPriceAttribute(){
        return 'Rp '.GeneralFunction::convertToCurrency($this->price);
    }
    
    public function getSubTotalPriceAttribute(){
        $res = $this->price * $this->stock;
        return 'Rp '.GeneralFunction::convertToCurrency($this->sub_total);
    }
    
    public function getProductCartIDAttribute(){
        if(isset($this->productVariant)){
            return $this->productVariant->id;
        } elseif(isset($this->productType)){
            return $this->productType->id;
        } else {
            return $this->product->id;
        }
    }
}
