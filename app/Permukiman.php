<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find($id)
 * @method static select($raw)
 */
class Permukiman extends Model
{
    //

    protected $table='permukimans';
    protected $fillable=[
        'nama_tpu',
        'luas_tpu',
        'daya_tampung',
        'tahun_digunakan',
        'lokasi',
        'kecamatan',
        'kelurahan',
        'RW',
        'RT',
        'status',
        'keterangan_status',
        'kondisi',
        'keterangan
       ];

    public function r_pengelola() {
        return $this->hasMany('App\Pengelola', 'permukiman_id');
    }

    public function r_foto_tpu() {
        return $this->hasMany('App\Fototpu', 'permukiman_id');
    }

    public function r_inventaris() {
        return $this->hasMany('App\Inventaris', 'permukiman_id');
    }

    public function r_koordinat_tpu() {
        return $this->hasMany('App\Koordinattpu', 'permukiman_id');
    }

    public function r_cctv_permukiman() {
        return $this->hasMany('App\CCTVPermukiman', 'permukiman_id');
    }
}
