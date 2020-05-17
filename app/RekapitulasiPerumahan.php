<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapitulasiPerumahan extends Model
{
    protected $table = 'perumahans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public static function getJumlahStatusPerumahan(){




        $category = '';


        $series[0]['name'] = 'Sudah Serah Terima';
        $series[1]['name'] = 'Belum Serah Terima';
        $series[2]['name'] = 'Terlantar';


        $j = 0;
//        for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) {
//            $category[] = $i;

            $series[0]['data'][] = Self::where('status_perumahan', '=', 'Sudah')->count();

            $series[1]['data'][] = Self::where('status_perumahan', '=', 'Belum')->count();

            $series[2]['data'][] = Self::where('status_perumahan', '=', 'Terlantar')->count();

//        }


        return ['category' => $category, 'series' => $series];


    }

}
