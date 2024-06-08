<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
    protected $table = '00_kelurahan_desa';
	protected $primaryKey = 'kelurahan_desa_id';

    public function scopeActive($query)
    {
        $query->where('active', true);
    }

    public function kebun(){
    	return $this->hasOne(Kebun::class,'kebun_id');
    }
}
