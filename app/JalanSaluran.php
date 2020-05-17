<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JalanSaluran extends Model
{
    protected $table= 'jalansalurans';
    public $fillable= ['perumahan_id','nama_jalan_saluran','luas_jalan_saluran','kondisi_jalan_saluran'];

    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }

    public function r_foto_jalan_saluran() {
        return $this->hasMany('App\FotoJalansaluran', 'jalansaluran_id');
    }
}
