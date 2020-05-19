<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, Perumahans $perumahan)
 */
class Sarana extends Model
{
    protected $table='saranas';
    protected $fillable = [
        'perumahan_id',
        'nama_sarana',
        'luas_sarana',
        'kondisi_sarana',
    ];


    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }
    public function r_foto_sarana() {
        return $this->hasMany('App/FotoSarana', 'sarana_id');
    }
    public function r_koordinat_saranas() {
        return $this->hasMany('App\KoordinatSarana', 'sarana_id');
    }
}
