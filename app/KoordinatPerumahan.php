<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $perumahan)
 * @method static create($value)
 * @method join(string $string, string $string1, string $string2, string $string3)
 */
class KoordinatPerumahan extends Model
{
    protected $table= 'koordinatperumahans';
    public $fillable = ['perumahan_id','longitude','latitude'];


    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
