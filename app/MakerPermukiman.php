<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakerPermukiman extends Model
{
    protected $table='location';
    protected $fillable=['id','city','let','lng'];
}
