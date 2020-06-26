<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basta extends Model
{
    protected $table='basta';
    protected $fillable=['perumahan_id','no_basta','tanggal'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
