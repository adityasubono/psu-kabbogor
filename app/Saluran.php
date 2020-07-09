<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 */
class Saluran extends Model
{
    //
    protected $table='salurans';
    protected $fillable=['perumahan_id','nama_saluran','jumlah','kondisi'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
