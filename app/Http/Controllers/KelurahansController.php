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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        $data_kelurahan = Kelurahan::where('kecamatan_id', $id)->get();
        return view('PSU_Kelurahan.edit', compact('data_kelurahan','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        //

        $data_kelurahan = $request->input('data_kelurahan');

        foreach ($data_kelurahan as $row){
            $kelurahan = Kelurahan::find($row['id']);
            $kelurahan->nama_kelurahan = $row['nama_kelurahan'];
            $kelurahan->save();
        }
        return redirect('/kecamatans')->with('status','Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelurahan  $kelurahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Kelurahan::destroy($id);
        return redirect('/kecamatans')->with('status','Data Kelurahan Berhasil Dihapus');
    }
}
