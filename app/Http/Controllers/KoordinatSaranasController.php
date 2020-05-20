<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use App\KoordinatSarana;
use App\Sarana;
use Illuminate\Http\Request;

class KoordinatSaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //

        $data_sarana = Sarana::find($id);
        $data_koordinat = KoordinatSarana::where('sarana_id',$id)->get();
        return view('PSU_Perumahan.sarana.koordinat.koordinat_sarana',
            compact('data_sarana','data_koordinat'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $sarana_id = $request->input('sarana_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $latlong = "[$latitude, $longitude, ],";

        $koordinat_sarana = new KoordinatSarana();
        $koordinat_sarana->perumahan_id = $request->input('perumahan_id');
        $koordinat_sarana->sarana_id = $request->input('sarana_id');
        $koordinat_sarana->longitude = $request->input('longitude');
        $koordinat_sarana->latitude = $request->input('latitude');
        $koordinat_sarana->latlong = $latlong;
        $koordinat_sarana->save();


        return redirect()->action('KoordinatSaranasController@index', ['id' => $sarana_id])
            ->with('status','Data Koordinat Sarana Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $koordinat = KoordinatSarana::where('sarana_id',$id)->get();
        return view ('PSU_Perumahan.sarana.koordinat.peta',compact('koordinat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\Response
     */
    public function edit(KoordinatSarana $koordinatSarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KoordinatSarana $koordinatSarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(KoordinatSarana $koordinatsarana)
    {
        KoordinatSarana::destroy($koordinatsarana->id);
        return redirect('/perumahans')->with('status','Data Success Delete');
    }
}
