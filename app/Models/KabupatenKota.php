<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $table = '00_kabupaten_kota';
	protected $primaryKey = 'kabupaten_kota_id';

    public function scopeActive($query)
    {
        $query->where('active', true);
    }
}
