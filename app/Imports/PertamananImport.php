<?php

namespace App\Imports;

use App\Pertamanan;
use Maatwebsite\Excel\Concerns\ToModel;

class PertamananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pertamanan([
            'nama_taman' => $row[0],
            'nama_pelaksana' => $row[1],
            'luas_taman'=> $row[2],
            'tahun_dibangun' => $row[3],
            'lokasi' => $row[4],
            'kecamatan' => $row[5],
            'kelurahan' => $row[6],
            'RW' => $row[7],
            'RT' => $row[8],
            'keterangan' => $row[9],
        ]);
    }
}
