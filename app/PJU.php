<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class PJU extends Model
{
    protected $table='pju';
    protected $fillable=['perumahan_id','jumlah','nama_pju','kondisi'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
