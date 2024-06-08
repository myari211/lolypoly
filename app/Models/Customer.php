<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Notifications\Notifiable;
use Laravel\Lumen\Auth\Authorizable;

class Customer extends Model
{

    use Uuid, SoftDeletes;

    public $incrementing = false;
    protected $table = "10_customer";
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
        "sales_id",
        "nama_usaha",
        "pelanggan_code",
        "nama_pj",
        "jabatan_pj",
        "phone_number",
        "provinsi_id",
        "kabupaten_kota_id",
        "kecamatan_id",
        "category_id",
        "category_bussines_id",
        "alamat",
        "row_status",
        "created_by",
        "updated_by",
    ];

    // public function admin(){
    //     return $this->belongsTo(Admin::class,"id",'user_id');
    // }

    public function sales(){
        return $this->belongsTo(User::class,"sales_id",'id');
    }
    public function lastTransaction()
    {
        return $this->hasOne(Transaction::class,"customer_id")->latest();
        // return $this->hasOne('App\Model\PhoneNumber')->latest();
    }
    public function lastCall()
    {
        return $this->hasOne(LogCall::class,"customer_id")->latest();
        // return $this->hasOne('App\Model\PhoneNumber')->latest();
    }

    public function category(){
        return $this->belongsTo(Category::class,"category_id",'id');
    }

    public function categoryBussines(){
        return $this->belongsTo(CategoryBussines::class,"category_bussines_id",'id');
    }
    
    public function provinsi(){
        return $this->belongsTo(Provinsi::class,"provinsi_id",'provinsi_id');
    }
    
    public function kelurahanDesa(){
        return $this->belongsTo(KelurahanDesa::class,"kelurahan_desa_id",'kelurahan_desa_id');
    }
    
    public function kabupatenKota(){
        return $this->belongsTo(KabupatenKota::class,"kabupaten_kota_id",'kabupaten_kota_id');
    }
    
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class,"kecamatan_id",'kecamatan_id');
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
