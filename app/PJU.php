<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PJU extends Model
{
    protected $table='pju';
    protected $fillable=['perumahan_id','jumlah','nama_pju','kondisi'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
