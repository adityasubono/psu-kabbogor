<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 */
class Rules extends Model
{

    protected $fillable = [
        'nama_rule'
    ];
    public function r_users() {
        return $this->belongsTo('App\User', 'id');
    }

}
