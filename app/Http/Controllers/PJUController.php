<?php

namespace App\Http\Controllers;

use App\PJU;
use Illuminate\Http\Request;

class PJUController extends Controller
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'data_pju.*.nama_pju' => 'required',
            'data_pju.*.jumlah' => 'required',
            'data_pju.*.kondisi' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_pju.*.nama_pju.required' => "Masukan Data Nama PJU ?",
            'data_pju.*.jumlah.required' => "Masukan Data Jumlah ?",
            'data_pju.*.kondisi.required' => "Masukan Data Pendidikan ?",
        ];

        $this->validate($request, $rules, $customMessages);
        foreach ($request->data_pju as $key => $value){
            PJU::create($value);
        }
        $pertamanan_id = $request->data_pju[0]['perumahan_id'];
        return redirect()->action('PerumahansController@edit', ['id' => $pertamanan_id])
            ->with('status','Data PJU Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PJU  $pJU
     * @return \Illuminate\Http\Response
     */
    public function show(PJU $pJU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PJU  $pJU
     * @return \Illuminate\Http\Response
     */
    public function edit(PJU $pJU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PJU  $pJU
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_pju' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        PJU::where('id', $id)->update([
            'nama_pju' => $request->nama_pju,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PJU  $pJU
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        PJU::destroy($id);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data PJU dengan ID '.$id.' Berhasil Dihapus');
    }
}
