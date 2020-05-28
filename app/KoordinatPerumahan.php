<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $perumahan)
 * @method static create($value)
 */
class KoordinatPerumahan extends Model
{
    protected $table= 'koordinatperumahans';
    public $fillable = ['perumahan_id','longitude','latitude'];


    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
