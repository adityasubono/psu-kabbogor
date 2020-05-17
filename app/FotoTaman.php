<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoTaman extends Model
{
    protected $table='fototamans';
    protected $fillable=['perumahan_id','taman_id','nama_foto','file_foto'];

    public function r_taman() {
        return $this->belongsTo('App/Taman', 'id');
    }
}
