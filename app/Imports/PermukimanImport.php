<?php

namespace App\Imports;

use App\Permukiman;
use Maatwebsite\Excel\Concerns\ToModel;

class PermukimanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Permukiman([
            'nama_tpu' => $row[0],
            'luas_tpu' => $row[1],
            'daya_tampung' => $row[2],
            'tahun_digunakan' => $row[3],
            'lokasi' => $row[4],
            'kecamatan' => $row[5],
            'kelurahan' => $row[6],
            'RW' => $row[7],
            'RT' => $row[8],
            'status' => $row[9],
            'keterangan_status' => $row[10],
            'kondisi' => $row[11],
            'keterangan' => $row[12]

        ]);
    }
}
