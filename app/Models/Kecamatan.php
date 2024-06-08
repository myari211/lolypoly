<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = '00_kecamatan';
	protected $primaryKey = 'kecamatan_id';

    public function scopeActive($query)
    {
        $query->where('active', true);
    }
}
