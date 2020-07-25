<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static where(string $string, $id)
 * @method static find($id)
 */
class Pertamanan extends Model
{
    //
    protected $fillable=[
        'nama_taman',
        'nama_pelaksana',
        'luas_taman',
        'tahun_dibangun',
        'lokasi',
        'kecamatan',
        'kelurahan',
        'RT',
        'RW',
        'keterangan'
    ];



    public function r_petugas() {
        return $this->hasMany('App\Petugas', 'pertamanan_id');
    }

    public function r_foto_pertamanan() {
        return $this->hasMany('App\FotoPertamanan', 'pertamanan_id');
    }

    public function r_pemeliharaan() {
        return $this->hasMany('App\Pemeliharaan', 'pertamanan_id');
    }

    public function r_softscape() {
        return $this->hasMany('App\Softscape', 'pertamanan_id');
    }

    public function r_hardscape() {
        return $this->hasMany('App\Hardscape', 'pertamanan_id');
    }

    public function r_koordinat_pertamanan() {
        return $this->hasMany('App\KoordinatPertamanan', 'pertamanan_id');
    }

    public function r_cctv_pertamanan() {
        return $this->hasMany('App\CCTVPertamanan', 'pertamanan_id');
    }



}
