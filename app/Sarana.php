<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, Perumahans $perumahan)
 * @method static create($value)
 * @method static find($id)
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
        return $this->belongsTo('App\Perumahans', 'id');
    }

    public function r_foto_sarana() {
        return $this->hasMany('App\FotoSarana', 'sarana_id');
    }

    public function r_koordinat_sarana() {
        return $this->hasMany('App\KoordinatSarana', 'sarana_id');
    }
}
