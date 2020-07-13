<?php

namespace App\Http\Controllers;

use App\IzinLokasi;
use Illuminate\Http\Request;

class IzinLokasiController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IzinLokasi  $izinLokasi
     * @return \Illuminate\Http\Response
     */
    public function show(IzinLokasi $izinLokasi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IzinLokasi  $izinLokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinLokasi $izinLokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IzinLokasi  $izinLokasi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perumahan_id' => 'required',
            'no_izin' => 'required',
            'tanggal_izin' => 'required',
        ];


        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');

        IzinLokasi::where('id',$id)->update([
            'perumahan_id' => $request->perumahan_id,
            'no_izin' => $request->no_izin,
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->tanggal_izin))

        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Izin Lokasi Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IzinLokasi  $izinLokasi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        IzinLokasi::destroy($id);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data Izin Lokasi Dengan ID ' . $id . ' Berhasil Dihapus');

    }
}
