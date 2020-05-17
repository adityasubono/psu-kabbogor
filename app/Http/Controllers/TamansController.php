<?php

namespace App\Http\Controllers;

use App\Taman;
use Illuminate\Http\Request;

class TamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //
        $data_perumahan = Perumahans::find($id);
        $data_sarana = Sarana::where('perumahan_id',$id)->get();
        $data_foto_taman = FotoSarana::where('perumahan_id',$id)->get();
        $data_koordinat_taman = KoordinatSarana::where('perumahan_id',$id)->get();
        return view('PSU_Perumahan.taman.index', compact('data_perumahan','data_sarana',
            'data_foto_sarana','data_koordinat_sarana'));

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
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\Response
     */
    public function show(Taman $taman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\Response
     */
    public function edit(Taman $taman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taman $taman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taman $taman)
    {
        //
    }
}
