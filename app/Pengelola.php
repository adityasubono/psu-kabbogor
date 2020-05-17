<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 * @method static create($value)
 */
class Pengelola extends Model
{
    //
    protected $table='pengelolas';
    protected $fillable=['permukiman_id','nama','umur','pendidikan','tugas','keterangan'];

    public function r_permukiman() {
        return $this->belongsTo('App\Permukiman', 'id');
    }
}
