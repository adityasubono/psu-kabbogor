<?php

namespace App\Imports;

use App\Perumahans;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

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
            'nama_perumahan' => $row[1],
            'nama_pengembang' => $row[2],
            'luas_perumahan' => $row[3],
            'jumlah_perumahan' => $row[4],
            'lokasi' => $row[5],
            'kecamatan' => $row[6],
            'kelurahan' => $row[7],
            'RW' => $row[8],
            'RT' => $row[9],
            'status_perumahan' => $row[10],
            'no_bast' => $row[11],
            'sph' => $row[12],
            'tgl_serah_terima' => $row[13],
            'keterangan' => $row[14],
        ]);
    }
}
