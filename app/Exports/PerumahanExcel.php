<?php

namespace App\Exports;

use App\Perumahans;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

/**
 * @method withHeadings()
 */
class PerumahanExcel implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return Perumahans::all('id','nama_perumahan','nama_pengembang',
        'luas_perumahan','jumlah_perumahan','lokasi','kecamatan','kelurahan','RW','RT',
        'status_perumahan','no_bast','sph','tgl_serah_terima','keterangan');
    }


    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'ID',
            'Nama Perumahan',
            'Nama Pengembang',
            'Luas Perumahan',
            'Jumlah Perumahan',
            'Alamat Lokasi',
            'Kecamatan',
            'Kelurahan',
            'RW',
            'RT',
            'Status Perumahan',
            'No. Beritas Acara Serah Terima',
            'Surat Pengakuan Hak',
            'Tanggal Serah Terima',
            'Keterangan'
        ];
    }

    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            },

        ];
    }
}
