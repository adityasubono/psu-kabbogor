<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create(array $all)
 */
class KoordinatJalanSaluran extends Model
{
    protected $table='koordinatjalansalurans';
    protected $fillable=['perumahan_id','jalansaluran_id','latlong','longitude','latitude'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }

    public function r_jalan_saluran() {
        return $this->belongsTo('App\JalanSaluran', 'id');
    }
}
