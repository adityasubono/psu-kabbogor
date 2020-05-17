<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('PSU_Kecamatan.index', compact('kelurahans'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $kecamatans = Kecamatan::all();
        return view('PSU_Kelurahan.create', compact('kecamatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'data_kelurahan.*.nama_kelurahan' => 'required',
//        ]);

        foreach ($request->data_kelurahan as $key => $value){
            Kelurahan::create($value);
        }
        return redirect('/kecamatans')->with('status','Data Success Insert');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return false|string
     */

    public function getKelurahan($id) {
        $kecamatans = Kecamatan::where("nama_kecamatan",$id)->pluck("id");

        $kelurahans = Kelurahan::where("kecamatan_id",$kecamatans)->pluck("nama_kelurahan","nama_kelurahan");
        return json_encode($kelurahans);

    }

    public function show(Kelurahan $kelurahan)
    {
//        $kecamatans = DB::table("kelurahans")->where("kecamatan_id",$kelurahan)->pluck
//        ("nama_kelurahan","id");
//        return json_encode($kecamatans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan)
    {
        //
    }
}
