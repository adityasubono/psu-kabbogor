<?php

namespace App\Exports;

use App\Pertamanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PertamananExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pertamanan::all('nama_taman','nama_pelaksana','luas_taman','tahun_dibangun',
            'lokasi','kecamatan','kelurahan','RW','RT','keterangan');
    }
}
