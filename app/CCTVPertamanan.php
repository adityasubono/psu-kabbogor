<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCTVPertamanan extends Model
{
    //
    protected $table='cctvpertamanans';
    protected $fillable=['pertamanan_id','nama_cctv','ip_cctv'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
