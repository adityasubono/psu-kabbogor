<?php

namespace App\Http\Controllers;

use App\Pengelola;
use App\Permukiman;
use Illuminate\Http\Request;

class PengelolahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //
        $data_permukiman = Permukiman::find($id);
        $data_pengelolah = Pengelola::where('permukiman_id',$id)->get();

        return view('PSU_Permukiman.pengelola.pengelola', compact('data_pengelolah','data_permukiman'));
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
        $rules = [
            'data_pengelola.*.nama' => 'required',
            'data_pengelola.*.umur' => 'required',
            'data_pengelola.*.pendidikan' => 'required',
            'data_pengelola.*.tugas' => 'required',
            'data_pengelola.*.keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_pengelola.*.nama.required' => "Masukan Data Nama Petugas ?",
            'data_pengelola.*.umur.required' => "Masukan Data Umur ?",
            'data_pengelola.*.pendidikan.required' => "Masukan Data Pendidikan Terakhir ?",
            'data_pengelola.*.tugas.required' => "Masukan Data Deskripsi Tugas Yang Dilakukan ?",
            'data_pengelola.*.keterangan.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);
        $permukiman_id = $request->data_pengelola[0]['permukiman_id'];
        foreach ($request->data_pengelola as $key => $value) {
            Pengelola::create($value);

        }

        return redirect()->action(
            'PengelolahsController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Simpan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengelola  $pengelolah
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Pengelola $pengelolah)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengelola  $pengelolah
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Pengelola $pengelolah)
    {
        //
        return view('PSU_Permukiman.pengelola.edit', compact('pengelolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengelola  $pengelola
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
//    public function update(Request $request, Pengelola $pengelola)
//    {
//        $rules = [
//            'nama' => 'required',
//            'umur' => 'required',
//            'jumlah' => 'required',
//            'tugas' => 'required',
//            'keterangan' => 'required',
//        ];
//
//        $customMessages = [
//            'required' => 'Masukan Data :attribute ini ?.',
//        ];
//
//        $this->validate($request, $rules, $customMessages);
//
//        $permukiman_id = $request->get('permukiman_id');
//        Pengelola::where('id', $pengelola->id)->update([
//            'nama' => $request->nama,
//            'umur' => $request->umur,
//            'pendidikan' => $request->pendidikan,
//            'tugas' => $request->tugas,
//            'keterangan' => $request->keterangan
//        ]);
//
//        return redirect()->action('PengelolahsController@index', ['id' => $permukiman_id])
//            ->with('status','Data Dengan ID '.$pengelola->id.' Berhasil Di Update');
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengelola  $pengelolah
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Pengelola $pengelolah)
    {
        //
        $permukiman_id = $request->get('permukiman_id');
        Pengelola::destroy($pengelolah->id);
        return redirect()->action(
            'PengelolahsController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$pengelolah->id);



    }

    public function update_data(Request $request, Pengelola $pengelola)
    {
        $rules = [
            'nama' => 'required',
            'umur' => 'required',
            'jumlah' => 'required',
            'tugas' => 'required',
            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $permukiman_id = $request->get('permukiman_id');
        Pengelola::where('id', 26)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'pendidikan' => $request->pendidikan,
            'tugas' => $request->tugas,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->action('PengelolahsController@index', ['id' => $permukiman_id])
            ->with('status','Data Dengan ID '.$pengelolah->id.' Berhasil Di Update');
    }
}
