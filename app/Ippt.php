<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ippt extends Model
{
    protected $table='ippt';
    protected $fillable=['perumahan_id','no_ippt','tanggal'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
