<?php

namespace App\Http\Controllers;

use App\Hardscape;
use App\KoordinatPertamanan;
use App\KoordinatPerumahan;
use App\Koordinattpu;
use App\Permukiman;
use App\Pertamanan;
use App\Perumahans;
use App\Softscape;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $jml_status_perumahan = Perumahans::where('status_perumahan','Sudah')->count();
//        return view('PSU_Rekapitulasi.index',compact('jml_status_perumahan'));

        $jml_status_sudah = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Sudah Serah Terima')
            ->pluck('count');

        $jml_status_belum = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Belum Serah Terima')
            ->pluck('count');


        $jml_status_terlantar = Perumahans::select(\DB::raw("COUNT(*) as count"))
            ->where('status_perumahan','Terlantar')
            ->pluck('count');

        $jml_assets_perumahan= Perumahans::all()->count();
        $jml_assets_pertamanan= Pertamanan::all()->count();
        $jml_assets_permukiman= Permukiman::all()->count();

        $jml_hardscape = Hardscape::select(\DB::raw("COUNT(*) as count"))->pluck('count');

        $jml_softscape = Softscape::select(\DB::raw("COUNT(*) as count"))->pluck('count');

        $jml_status_sudah_tpu = Permukiman::select(\DB::raw("COUNT(*) as count"))
            ->where('status','Sudah Beroperasional')
            ->pluck('count');

        $jml_status_belum_tpu = Permukiman::select(\DB::raw("COUNT(*) as count"))
            ->where('status','Belum Beroperasional')
            ->pluck('count');


        $koordinatpertamanan = new KoordinatPertamanan();
        $koor_pertamanan = $koordinatpertamanan->join('pertamanans', 'koordinatpertamanans.pertamanan_id',
            '=', 'pertamanans.id')->select('longitude','latitude','nama_taman','lokasi',
            'kecamatan','kelurahan','RT','RW')->get();

        $koordinattpu = new Koordinattpu();
        $koor_permukiman = $koordinattpu->join('permukimans', 'koordinattpus.permukiman_id',
            '=', 'permukimans.id')->select('longitude','latitude','nama_tpu','lokasi',
            'kecamatan','kelurahan','RT','RW')->get();

        $koor_perumahan = DB::select('SELECT nama_perumahan, perumahan_id, longitude, latitude, status_perumahan,
                               lokasi, luas_perumahan, jumlah_perumahan, nama_pengembang, kecamatan, kelurahan,
                               COUNT(perumahan_id) FROM  perumahans JOIN koordinatperumahans
                               ON perumahans.id = koordinatperumahans.perumahan_id GROUP BY perumahan_id
                               HAVING COUNT(perumahan_id > 1)');

        return view('PSU_Rekapitulasi.index',compact('jml_status_sudah','jml_status_belum',
            'jml_status_terlantar','jml_assets_perumahan','jml_assets_pertamanan','jml_assets_permukiman',
            'jml_softscape','jml_hardscape','jml_status_belum_tpu','jml_status_sudah_tpu','koor_pertamanan',
            'koor_permukiman','koor_perumahan'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
