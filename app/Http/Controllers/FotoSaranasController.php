<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use Illuminate\Http\Request;

class FotoSaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = new \App\FotoSarana();
        $data->perumahan_id = $request->input('perumahan_id');
        $data->sarana_id = $request->input('sarana_id');
        $data->nama_foto = $request->input('nama_foto');
        $file_foto = $request->file('file_foto_sarana');
        $ext = $file_foto->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file_foto->move('assets/uploads/file_sarana',$newName);
        $data->file_foto = $newName;
        $data->save();
        return redirect('/perumahans')->with('status','Data Foto Success Insert');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Http\Response
     */
    public function show(FotoSarana $fotoSarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoSarana $fotoSarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FotoSarana $fotoSarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\FotoSarana $fotosarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(FotoSarana $fotosarana)
    {
        //
        FotoSarana::destroy($fotosarana->id);
        return redirect('/perumahans')->with('status','Data Success Delete');
    }
}
