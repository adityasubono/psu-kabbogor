<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1)
 * @method static find($perumahan)
 * @method static select($raw)
 * @method static create(array $all)
 */
class Perumahans extends Model
{
    protected $fillable = [
        'nama_perumahan',
        'nama_pengembang',
        'luas_perumahan',
        'jumlah_perumahan',
        'lokasi',
        'kecamatan',
        'kelurahan',
        'RT',
        'RW',
        'status_perumahan',
        'tgl_serah_terima',
        'no_bast',
        'sph',
        'keterangan',
        ];

    public function r_sarana() {
        return $this->hasMany('App\Sarana', 'perumahan_id');
    }
    public function r_foto_sarana() {
        return $this->hasMany('App\FotoSarana', 'perumahan_id');
    }

    public function r_koordinat_sarana() {
        return $this->hasMany('App\KoordinatSarana', 'perumahan_id');
    }


    public function r_jalan_saluran() {
        return $this->hasMany('App\JalanSaluran', 'perumahan_id');
    }
    public function r_foto_jalan_saluran() {
        return $this->hasMany('App\FotoJalanSaluran', 'perumahan_id');
    }
    public function r_koordinat_jalan_saluran() {
        return $this->hasMany('App\KoordinatJalanSaluran', 'perumahan_id');
    }


    public function r_taman() {
        return $this->hasMany('App\Taman', 'perumahan_id');
    }

    public function r_foto_taman() {
        return $this->hasMany('App\FotoTaman', 'perumahan_id');
    }
    public function r_koordinat_taman() {
        return $this->hasMany('App\KoordinatTaman', 'perumahan_id');
    }

    public function r_koordinat_perumahan() {
        return $this->hasMany('App\KoordinatPerumahan', 'perumahan_id');
    }

    public function r_cctv_perumahan() {
        return $this->hasMany('App\CCTVPerumahan', 'perumahan_id');
    }

    public function r_bast() {
        return $this->hasMany('App\Bast', 'perumahan_id');
    }

    public function r_basta() {
        return $this->hasMany('App\Basta', 'perumahan_id');
    }

    public function r_foto_perumahan() {
        return $this->hasMany('App\FotoPerumahan', 'perumahan_id');
    }

    public function r_ippt() {
        return $this->hasMany('App\Ippt', 'perumahan_id');
    }

    public function r_izin_lokasi() {
        return $this->hasMany('App\IzinLokasi', 'perumahan_id');
    }

    public function r_pju() {
        return $this->hasMany('App\PJU', 'perumahan_id');
    }

    public function r_saluran() {
        return $this->hasMany('App\Saluran', 'perumahan_id');
    }

    public function r_siteplan() {
        return $this->hasMany('App\Siteplan', 'perumahan_id');
    }
}
