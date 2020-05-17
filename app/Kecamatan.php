<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama_kecamatan'
    ];

    public function r_kelurahan() {
        return $this->hasMany('App\Kelurahan', 'kecamatan_id');
    }
}
