<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static create($value)
 */
class Hardscape extends Model
{
    //
    protected $fillable=[
        'pertamanan_id',
        'nama_alat',
        'tipe',
        'tahun_perolehan',
        'kondisi',
        'keterangan'
    ];

    public function r_pertamanan() {
        return $this->belongsTo('App\Pertamanan', 'id');
    }
}
