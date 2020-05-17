<?php

namespace App\Http\Controllers;

use App\FotoJalanSaluran;
use Illuminate\Http\Request;

class FotoJalanSaluranController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //
        $data = new \App\FotoJalanSaluran();
        $data->perumahan_id = $request->input('perumahan_id');
        $data->jalansaluran_id = $request->input('jalansaluran_id');
        $data->nama_foto = $request->input('nama_foto');
        $file_foto = $request->file('file_foto');
        $ext = $file_foto->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file_foto->move('assets/uploads/file_jalan_saluran',$newName);
        $data->file_foto = $newName;
        $data->save();
        return redirect('/perumahans')->with('status','Data Foto Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(FotoJalanSaluran $fotoJalanSaluran)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoJalanSaluran $fotoJalanSaluran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FotoJalanSaluran $fotoJalanSaluran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function destroy(FotoJalanSaluran $fotoJalanSaluran)
    {
        //
    }
}
