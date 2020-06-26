<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saluran extends Model
{
    //
    protected $table='saluran';
    protected $fillable=['perumahan_id','nama_saluran','jumlah','kondisi'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
