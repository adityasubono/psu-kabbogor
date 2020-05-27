<?php

namespace App\Imports;

use App\Perumahans;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerumahanImport implements ToModel, WithHeadingRow

{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */




    public function model(array $row)

    {
        return new Perumahans([
            'nama_perumahan' => $row['nama perumahan'],
            'nama_pengembang' => $row['Nama Pengembang'],
            'luas_perumahan' => $row[' Luas Perumahan'],
            'jumlah_perumahan' => $row['Jumlah Perumahan'],
            'lokasi' => $row['Alamat Lokasi'],
            'kecamatan' => $row['Kecamatan'],
            'kelurahan' => $row['Kelurahan'],
            'RW' => $row['RW'],
            'RT' => $row['RT'],
            'status_perumahan' => $row['Status Perumahan'],
            'no_bast' => $row['No. Beritas Acara Serah Terima'],
            'sph' => $row['Surat Pengakuan Hak'],
            'tgl_serah_terima' => $row['Tanggal Serah Terima'],
            'keterangan' => $row['Keterangan'],
        ]);
    }
}
