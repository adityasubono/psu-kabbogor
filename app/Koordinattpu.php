<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 * @method join(string $string, string $string1, string $string2, string $string3)
 */
class Koordinattpu extends Model
{
    //

    protected $table='koordinattpus';
    protected $fillable=['permukiman_id','longitude','latitude'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
