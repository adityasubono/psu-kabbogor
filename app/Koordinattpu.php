<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class Koordinattpu extends Model
{
    //
    protected $fillable=['permukiman_id','longitude','latitude'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
