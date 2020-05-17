<?php

namespace App\Http\Controllers;

use App\FotoJalanSaluran;
use App\FotoSarana;
use App\JalanSaluran;
use App\KoordinatJalanSaluran;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;

class JalanSaluransController extends Controller
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
        $data_jalan_saluran = JalanSaluran::where('perumahan_id',$id)->get();
        $data_foto_jalan_saluran = FotoJalanSaluran::where('perumahan_id',$id)->get();
        $data_koordinat_jalan_saluran = KoordinatJalanSaluran::where('perumahan_id',$id)->get();
        return view('PSU_Perumahan.jalansaluran.index', compact('data_perumahan','data_jalan_saluran',
            'data_foto_jalan_saluran','data_koordinat_jalan_saluran'));
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
        foreach ($request->data_jalan_saluran as $key => $value){
            JalanSaluran::create($value);
        }
        return redirect('/perumahans')->with('status','Data Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function show(JalanSaluran $jalanSaluran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function edit(JalanSaluran $jalanSaluran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JalanSaluran $jalanSaluran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JalanSaluran $jalanSaluran)
    {
        //
    }
}
