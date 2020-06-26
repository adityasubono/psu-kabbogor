<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPerumahan extends Model
{
    protected $table='fotoperumahans';
    protected $fillable=['perumahan_id','file_foto','keterangan'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
