<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\KoordinatPertamanan;
use App\KoordinatSarana;
use App\Koordinattpu;
use App\MakerPermukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakerPermukimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $locations_permukiman = Koordinattpu::all();
        $locations_pertamanan = KoordinatPertamanan::all();
        $locations_sarana = KoordinatSarana::all();
        return view('PSU_Kegiatan_Fisik.index',compact('locations_pertamanan',
            'locations_permukiman','locations_sarana'));
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
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function show(MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function edit(MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakerPermukiman $makerPermukiman)
    {
        //
    }
}
