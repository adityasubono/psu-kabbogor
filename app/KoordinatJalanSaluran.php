<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class KoordinatJalanSaluran extends Model
{
    protected $table='koordinatjalansalurans';
    protected $fillable=['perumahan_id','jalansaluran_id','nama_koordinat','longitude','latitude'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahan', 'id');
    }

    public function r_jalan_saluran() {
        return $this->belongsTo('App\JalanSaluran', 'id');
    }
}
