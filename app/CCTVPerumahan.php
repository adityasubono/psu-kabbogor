<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCTVPerumahan extends Model
{
    protected $table='cctvperumahans';
    public $fillable=['perumahan_id','nama_cctv','ip_camera'];

    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }
}