<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class Kelurahan extends Model
{
    public $fillable= ['kecamatan_id','nama_kelurahan'];

    public function r_kecamatan() {
        return $this->belongsTo('App/Kecamatan', 'id');
    }
}
