<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoordinatTaman extends Model
{
    protected $table='koordinattamans';
    protected $fillable=['perumahan_id','taman_id','nama_koordinat','longitude','latitude'];

    public function r_taman() {
        return $this->belongsTo('App/Taman', 'id');
    }
}
