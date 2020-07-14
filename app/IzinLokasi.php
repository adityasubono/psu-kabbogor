<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $perumahan)
 */
class IzinLokasi extends Model
{
    protected $table='izin_lokasi';
    protected $fillable=['perumahan_id','no_izin','tanggal'];

    public function r_perumahan() {
        return $this->belongsTo('App\Perumahans', 'id');
    }
}
