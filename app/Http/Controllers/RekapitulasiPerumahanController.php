<?php

namespace App\Http\Controllers;

use App\KoordinatPerumahan;
use App\KoordinatSarana;
use App\Perumahans;
use App\RekapitulasiPerumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $data_koordinat_perumahan = DB::select('SELECT * FROM koordinatperumahans
                                                JOIN perumahans
                                                ON perumahans.id = koordinatperumahans.perumahan_id');


        $data_koordinat_perumahan_group_by = DB::select("SELECT * FROM koordinatperumahans
                                                          JOIN perumahans
                                                          ON perumahans.id = koordinatperumahans.perumahan_id
                                                          GROUP BY koordinatperumahans.perumahan_id");


        $data_koordinat_sarana = DB::select('SELECT * FROM koordinatsaranas
                                             JOIN perumahans
                                             ON perumahans.id = koordinatsaranas.perumahan_id');


        $data_koordinat_sarana_group_by = DB::select('SELECT * FROM koordinatsaranas
                                                      JOIN perumahans
                                                      ON perumahans.id = koordinatsaranas.perumahan_id
                                                      JOIN saranas
                                                      ON saranas.perumahan_id = perumahans.id
                                                      GROUP BY koordinatsaranas.sarana_id');


        $data_koordinat_jalansaluran = DB::select('SELECT * FROM koordinatjalansalurans
                                                   JOIN jalansalurans
                                                   ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id');


        $data_koordinat_jalansaluran_group_by = DB::select('SELECT * FROM koordinatjalansalurans
                                                            JOIN jalansalurans
                                                            ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id
                                                            JOIN perumahans
                                                            ON perumahans.id = jalansalurans.perumahan_id
                                                            GROUP BY koordinatjalansalurans.jalansaluran_id');

        $data_koordinat_taman = DB::select('SELECT * FROM koordinattamans
                                            JOIN tamans
                                            ON tamans.id = koordinattamans.taman_id');


        $data_koordinat_taman_group_by = DB::select('SELECT * FROM koordinattamans
                                                     JOIN tamans
                                                     ON tamans.id = koordinattamans.taman_id
                                                     JOIN perumahans
                                                     ON perumahans.id = tamans.perumahan_id
                                                     GROUP BY koordinattamans.taman_id');

        return view('PSU_Perumahan.rekapitulasi.index',compact('jml_status_sudah',
            'jml_status_belum','jml_status_terlantar','data_koordinat_perumahan',
            'data_koordinat_perumahan_group_by','data_koordinat_sarana','data_koordinat_sarana_group_by',
            'data_koordinat_jalansaluran','data_koordinat_jalansaluran_group_by','data_koordinat_taman',
            'data_koordinat_taman_group_by'));
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
