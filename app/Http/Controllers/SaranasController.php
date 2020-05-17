<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;

class SaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_perumahan = Perumahans::find($id);
        $data_sarana = Sarana::where('perumahan_id',$id)->get();
        $data_foto_sarana = FotoSarana::where('perumahan_id',$id)->get();
        $data_koordinat_sarana = KoordinatSarana::where('perumahan_id',$id)->get();
        return view('PSU_Perumahan.sarana.index', compact('data_perumahan','data_sarana',
        'data_foto_sarana','data_koordinat_sarana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('PSU_Perumahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        foreach ($request->data_sarana as $key => $value){
            Sarana::create($value);
        }
        return redirect('/perumahans')->with('status','Data Success Insert');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarana $sarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sarana $sarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Sarana $sarana)
    {
        //
        Sarana::destroy($sarana->id);
        return redirect('/perumahans')->with('status','Data Success Delete');
    }
}
