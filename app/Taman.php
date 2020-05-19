<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $perumahan)
 */
class Taman extends Model
{
    protected $table= 'tamans';
    public $fillable= ['perumahan_id','nama_taman','luas_taman','kondisi_taman'];

    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }

    public function r_foto_taman() {
        return $this->hasMany('App/Perumahan', 'taman_id');
    }

    public function r_koordinat_taman() {
        return $this->hasMany('App/KoordinatTaman', 'taman_id');
    }
}
