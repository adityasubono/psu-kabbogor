<?php

namespace App\Http\Controllers;

use App\Saluran;
use Illuminate\Http\Request;

class SaluransController extends Controller
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
            'data_saluran.*.nama_saluran' => 'required',
            'data_saluran.*.jumlah' => 'required',
            'data_saluran.*.kondisi' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_saluran.*.nama_pju.required' => "Masukan Data Nama Saluran?",
            'data_saluran.*.jumlah.required' => "Masukan Data Jumlah Saluran ?",
            'data_saluran.*.kondisi.required' => "Masukan Data Kondisi Saluran ?",
        ];

        $this->validate($request, $rules, $customMessages);
        foreach ($request->data_saluran as $key => $value){
            Saluran::create($value);
        }
        $pertamanan_id = $request->data_saluran[0]['perumahan_id'];
        return redirect()->action('PerumahansController@edit', ['id' => $pertamanan_id])
            ->with('status','Data PJU Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saluran  $saluran
     * @return \Illuminate\Http\Response
     */
    public function show(Saluran $saluran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saluran  $saluran
     * @return \Illuminate\Http\Response
     */
    public function edit(Saluran $saluran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saluran  $saluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_saluran' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Saluran::where('id', $id)->update([
            'nama_saluran' => $request->nama_saluran,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Saluranb Bersih Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saluran  $saluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        Saluran::destroy($id);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Saluran Bersih dengan ID '.$id.' Berhasil Dihapus');
    }
}
