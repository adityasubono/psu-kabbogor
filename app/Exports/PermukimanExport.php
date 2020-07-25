<?php

namespace App\Exports;

use App\Permukiman;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermukimanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permukiman::all('nama_tpu','luas_tpu',
            'daya_tampung','tahun_digunakan','lokasi','kecamatan','kelurahan',
            'RW','RT','status','keterangan_status','kondisi','keterangan');
    }


}
