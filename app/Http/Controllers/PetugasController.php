<?php

namespace App\Http\Controllers;

use App\Pertamanan;
use App\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_petugas    = Petugas::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.petugas.petugas', compact('data_petugas','data_pertamanan'));
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
        $rules = [
            'data_petugas.*.nama' => 'required',
            'data_petugas.*.umur' => 'required',
            'data_petugas.*.pendidikan' => 'required',
            'data_petugas.*.tugas' => 'required',
            'data_petugas.*.keterangan_tugas' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_petugas.*.nama.required' => "Masukan Data Nama Petugas ?",
            'data_petugas.*.umur.required' => "Masukan Data Umur ?",
            'data_petugas.*.pendidikan.required' => "Masukan Data Pendidikan ?",
            'data_petugas.*.tugas.required' => "Masukan Data Deskripsi Tugas ?",
            'data_petugas.*.keterangan_tugas.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_petugas as $key => $value){
            Petugas::create($value);
        }

        $pertamanan_id = $request->data_petugas[0]['pertamanan_id'];

        return redirect()->action('PetugasController@index', ['id' => $pertamanan_id])
            ->with('status','Data Petugas Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Petugas $petugas)
    {
        return view('PSU_Pertamanan.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Petugas $petugas)
    {
        $rules = [
            'nama' => 'required',
            'umur' => 'required',
            'pendidikan' => 'required',
            'tugas' => 'required',
            'keterangan_tugas' => 'required'
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $pertamanan_id = $request->get('pertamanan_id');
        Petugas::where('id', $petugas->id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'pendidikan' => $request->pendidikan,
            'tugas' => $request->tugas,
            'keterangan_tugas' => $request->keterangan_tugas
        ]);
        return redirect()->action('PetugasController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$petugas->id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Petugas $petugas)
    {
        $pertamanan_id = $request->get('pertamanan_id');
        Petugas::destroy($petugas->id);
        return redirect()->action(
            'PetugasController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID'.$petugas->id.' Berhasil Dihapus');
    }
}
