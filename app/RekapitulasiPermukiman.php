<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiPermukiman extends Model
{
    //
    protected $table = 'permukimans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public static function getJumlahStatusPermukiman(){

        $category = '';

        $series[0]['name'] = 'Sudah Beroperasional';
        $series[1]['name'] = 'Belum Beroperasional';

        $j = 0;
//        for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) {
//            $category[] = $i;

        $series[0]['data'][] = Self::where('status', '=', 'Sudah Beroperasional')->count();

        $series[1]['data'][] = Self::where('status', '=', 'Belum Beroperasional')->count();

        return ['category' => $category, 'series' => $series];
    }
}
