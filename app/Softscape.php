<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Softscape extends Model
{
    //
    protected $fillable=[
        'perumahan_id',
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
