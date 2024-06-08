<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CustomerAddress extends Model
{
    use Uuid, SoftDeletes;

    public $incrementing = false;
    protected $table = "10_customer_address";
    protected $keyType = 'string';
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        "id",
        "user_id",
        "name",
        "address",
        "phone_number",
        "provinsi_id",
        "kabupaten_kota_id",
        "kecamatan_id",
        "kelurahan_desa_id",
        "kode_pos",
        "row_status",
        "created_by",
        "updated_by",
    ];
    protected $with = ['provinsi', 'kabupatenKota','kecamatan','kelurahanDesa'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, "provinsi_id", 'provinsi_id')->select(['provinsi_id', 'provinsi_name']);
    }
    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class, "kabupaten_kota_id", 'kabupaten_kota_id')->select(['kabupaten_kota_id', 'kabupaten_kota_name']);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, "kecamatan_id", 'kecamatan_id')->select(['kecamatan_id', 'kecamatan_name']);
    }
    public function kelurahanDesa()
    {
        return $this->belongsTo(KelurahanDesa::class, "kelurahan_desa_id", 'kelurahan_desa_id')->select(['kelurahan_desa_id', 'kelurahan_desa_name']);
    }
}
