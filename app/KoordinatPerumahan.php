<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoordinatPerumahan extends Model
{
    protected $table= 'koordinatperumahans';
    public $fillable = ['perumahan_id','longitude','latitude'];
    public function r_perumahan() {
        return $this->belongsTo('App/Perumahan', 'id');
    }
}
