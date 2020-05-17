<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class RekapitulasiPertamanan extends Model
{
    protected $table = 'permukimans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public static function getJumlahHardscapeSoftscape(){

//        $category = '';
//
//        $series[0]['name'] = 'Hardscape';
//        $series[1]['name'] = 'Softscape';
//
//        $category[0]['name'] = 'Hardscape';
//        $category[1]['name'] = 'Softscape';
//
//        $j = 0;
//        for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) {
//            $category[] = $i;

//        $series[0]['data'][] = Self::where('status', '=', 'Sudah Beroperasional')->count();
//        $series[1]['data'][] = Self::where('status', '=', 'Sudah Beroperasional')->count();

//        $series[0]['data'][] = Hardscape::all()->count();
//
//        $series[1]['data'][] = Softscape::all()->count();

//        return ['category' => $category, 'series' => $series];
    }
}
