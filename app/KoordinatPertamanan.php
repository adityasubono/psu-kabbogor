<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoordinatPertamanan extends Model
{
    //
    protected $fillable=['pertamanan_id','longitude','latitude'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
