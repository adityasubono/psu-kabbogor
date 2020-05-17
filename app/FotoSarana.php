<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoSarana extends Model
{
    protected $table='fotosaranas';
    protected $fillable=['sarana_id','perumahan_id','nama_foto','file_foto'];

    public function r_sarana() {
        return $this->belongsTo('App/Sarana', 'id');
    }
    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }
}
