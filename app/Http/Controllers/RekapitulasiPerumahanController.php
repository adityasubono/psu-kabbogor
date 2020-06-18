<?php

namespace App\Http\Controllers;

use App\KoordinatPerumahan;
use App\KoordinatSarana;
use App\Perumahans;
use App\RekapitulasiPerumahan;
use Illuminate\Http\Request;

class RekapitulasiPerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jml_status_sudah = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Sudah Serah Terima')
            ->pluck('count');

        $jml_status_belum = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Belum Serah Terima')
            ->pluck('count');


        $jml_status_terlantar = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Terlantar')
            ->pluck('count');

//        $surats = \DB::table('surat_masuk')
//            ->join('jenis_surat', 'surat_masuk.id_jenis_surat', '=','jenis_surat.id_jenis_surat')
//            ->select('jenis_surat.jenis_surat','surat_masuk.nomor_surat','surat_masuk.perihal','surat_masuk.tanggal_publish')
//            ->get();

        $koordinat_perumahan = \DB::table('koordinatperumahans')
            ->join('perumahans', 'perumahans.id', '=','koordinatperumahans.perumahan_id')
            ->select('koordinatperumahans.perumahan_id','koordinatperumahans.latitude','koordinatperumahans.longitude',
                'perumahans.id','perumahans.nama_perumahan','perumahans.nama_perumahan','perumahans.lokasi',
            'perumahans.kecamatan','perumahans.kelurahan','perumahans.RT','perumahans.RW')
            ->get();

        $perumahans = Perumahans::select(\DB::raw("SELECT * FROM perumahans a, koordinatperumahans b WHERE a.id = b.perumahan_id"));


        $koordinat_sarana = \DB::table('koordinatsaranas')
            ->join('perumahans', 'perumahans.id', '=','koordinatsaranas.perumahan_id')
            ->select('koordinatsaranas.perumahan_id','koordinatsaranas.latitude','koordinatsaranas.longitude',
                'perumahans.id','perumahans.nama_perumahan','perumahans.nama_perumahan','perumahans.lokasi',
                'perumahans.kecamatan','perumahans.kelurahan','perumahans.RT','perumahans.RW')
            ->get();


        return view('PSU_Perumahan.rekapitulasi.index',compact('jml_status_sudah',
            'jml_status_belum','jml_status_terlantar','koordinat_perumahan','perumahans','koordinat_sarana'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RekapitulasiPerumahan  $rekapitulasiPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(RekapitulasiPerumahan $rekapitulasiPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekapitulasiPerumahan  $rekapitulasiPerumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapitulasiPerumahan $rekapitulasiPerumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekapitulasiPerumahan  $rekapitulasiPerumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapitulasiPerumahan $rekapitulasiPerumahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekapitulasiPerumahan  $rekapitulasiPerumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapitulasiPerumahan $rekapitulasiPerumahan)
    {
        //
    }
}
