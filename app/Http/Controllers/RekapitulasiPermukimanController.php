<?php

namespace App\Http\Controllers;

use App\Koordinattpu;
use App\Permukiman;
use App\RekapitulasiPermukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapitulasiPermukimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $jml_status_sudah = Permukiman::select(\DB::raw("COUNT(*) as count"))
            ->where('status','Sudah Beroperasional')
            ->pluck('count');

        $jml_status_belum = Permukiman::select(\DB::raw("COUNT(*) as count"))
            ->where('status','Belum Beroperasional')
            ->pluck('count');

             $koordinattpu = new Koordinattpu();
             $koordinattpus = $koordinattpu->join('permukimans', 'koordinattpus.permukiman_id',
                 '=', 'permukimans.id')->select('longitude','latitude','nama_tpu','lokasi',
             'kecamatan','kelurahan','RT','RW')->get();

        return view('PSU_Permukiman.rekapitulasi.index',
            compact('jml_status_sudah', 'jml_status_belum','koordinattpus'));

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
     * @param  \App\RekapitulasiPermukiman  $rekapitulasiPermukiman
     * @return \Illuminate\Http\Response
     */
    public function show(RekapitulasiPermukiman $rekapitulasiPermukiman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekapitulasiPermukiman  $rekapitulasiPermukiman
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapitulasiPermukiman $rekapitulasiPermukiman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekapitulasiPermukiman  $rekapitulasiPermukiman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapitulasiPermukiman $rekapitulasiPermukiman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekapitulasiPermukiman  $rekapitulasiPermukiman
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapitulasiPermukiman $rekapitulasiPermukiman)
    {
        //
    }
}
