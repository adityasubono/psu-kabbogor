<?php

namespace App\Http\Controllers;


use App\Hardscape;
use App\KoordinatPertamanan;
use App\Permukiman;
use App\RekapitulasiPertamanan;

use App\Softscape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapitulasiPertamananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jml_hardscape = Hardscape::select(\DB::raw("COUNT(*) as count"))->pluck('count');

        $jml_softscape = Softscape::select(\DB::raw("COUNT(*) as count"))->pluck('count');

        $koordinatpertamanan = new KoordinatPertamanan();
        $koor_pertamanan = $koordinatpertamanan->join('pertamanans', 'koordinatpertamanans.pertamanan_id',
            '=', 'pertamanans.id')->select('longitude','latitude','nama_taman','lokasi',
            'kecamatan','kelurahan','RT','RW')->get();
        return view('PSU_Pertamanan.rekapitulasi.index',
            compact('jml_hardscape', 'jml_softscape', 'koor_pertamanan'));

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
     * @param  \App\RekapitulasiPertamanan  $rekapitulasiPertamanan
     * @return \Illuminate\Http\Response
     */
    public function show(RekapitulasiPertamanan $rekapitulasiPertamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekapitulasiPertamanan  $rekapitulasiPertamanan
     * @return \Illuminate\Http\Response
     */
    public function edit(RekapitulasiPertamanan $rekapitulasiPertamanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekapitulasiPertamanan  $rekapitulasiPertamanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekapitulasiPertamanan $rekapitulasiPertamanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekapitulasiPertamanan  $rekapitulasiPertamanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekapitulasiPertamanan $rekapitulasiPertamanan)
    {
        //
    }
}
