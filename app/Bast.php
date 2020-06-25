<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    protected $table='bast';
    protected $fillable=['perumahan_id','tanggal','no_bast','no_spk'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
