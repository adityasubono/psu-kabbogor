<?php

namespace App\Http\Controllers;

use App\Pertamanan;
use App\Softscape;
use Illuminate\Http\Request;

class SoftscapesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_softscape = Softscape::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.softscape.softscape', compact('data_softscape','data_pertamanan'));
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
            'data_softscape.*.nama_alat' => 'required',
            'data_softscape.*.tipe' => 'required',
            'data_softscape.*.tahun_perolehan' => 'required|',
            'data_softscape.*.kondisi' => 'required',
            'data_softscape.*.keterangan' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_softscape.*.nama_alat.required' => "Masukan Data Nama Alat ?",
            'data_softscape.*.tipe.required' => "Masukan Jenis Tipe ?",
            'data_softscape.*.tahun_perolehan.required' => "Masukan Tahun Diperoleh ?",
            'data_softscape.*.kondisi.required' => "Masukan Data Kondisi ?",
            'data_softscape.*.keterangan.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_softscape as $key => $value){
            Softscape::create($value);
        }

        $pertamanan_id = $request->data_softscape[0]['pertamanan_id'];

        return redirect()->action('SoftscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Peralatan Softscape Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Softscape  $softscape
     * @return \Illuminate\Http\Response
     */
    public function show(Softscape $softscape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Softscape  $softscape
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Softscape $softscape)
    {
        //
        return view('PSU_Pertamanan.softscape.edit', compact('softscape'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Softscape  $softscape
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Softscape $softscape)
    {
        $rules = [
            'nama_alat' => 'required',
            'tipe' => 'required',
            'tahun_perolehan' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $pertamanan_id = $request->get('pertamanan_id');
        Softscape::where('id', $softscape->id)->update([
            'nama_alat' => $request->nama_alat,
            'tipe' => $request->tipe,
            'tahun_perolehan' => $request->tahun_perolehan,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->action('SoftscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$softscape->id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Softscape  $softscape
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Softscape $softscape)
    {
        $pertamanan_id = $request->get('pertamanan_id');
        Softscape::destroy($softscape->id);
        return redirect()->action(
            'SoftscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$softscape->id);
    }
}
