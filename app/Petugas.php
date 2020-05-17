<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class Petugas extends Model
{
    //
    protected $fillable=['pertamanan_id','nama','umur','pendidikan','tugas','keterangan_tugas'];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }

}
