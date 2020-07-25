<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class Inventaris extends Model
{
    //
    protected $fillable=['permukiman_id','nama_alat','jumlah','keterangan'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
