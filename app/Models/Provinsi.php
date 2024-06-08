<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = '00_provinsi';
	protected $primaryKey = 'provinsi_id';

    public function scopeActive($query)
    {
        $query->where('active', true);
    }

    public function getProvinsiNameAttribute($value){
        return ucwords(strtolower($this->attributes['provinsi_name']));
    }
}
