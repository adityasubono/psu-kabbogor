<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($id)
 * @method static find($id)
 */
class Fototpu extends Model
{
    //
    protected $fillable=['permukiman_id','nama_foto','file_foto'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
