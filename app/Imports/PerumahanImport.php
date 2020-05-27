<?php

namespace App\Imports;

use App\Perumahans;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerumahanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Perumahans([
            'nama_perumahan' => $row[0],
            'nama_pengembang' => $row[1],
            'luas_perumahan' => $row[2],
            'jumlah_perumahan' => $row[3],
            'lokasi' => $row[4],
            'kecamatan' => $row[5],
            'kelurahan' => $row[6],
            'RW' => $row[7],
            'RT' => $row[8],
            'status_perumahan' => $row[9],
            'no_bast' => $row[10],
            'sph' => $row[11],
            'tgl_serah_terima' => $row[12],
            'keterangan' => $row[13],
        ]);
    }
}
