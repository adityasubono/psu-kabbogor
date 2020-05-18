<?php

namespace App\Http\Controllers;

use App\Hardscape;
use App\Pertamanan;
use Illuminate\Http\Request;

class HardscapesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_hardscape = Hardscape::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.hardscape.hardscape', compact('data_hardscape','data_pertamanan'));
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
            'data_hardscape.*.nama_alat' => 'required',
            'data_hardscape.*.tipe' => 'required',
            'data_hardscape.*.tahun_perolehan' => 'required|',
            'data_hardscape.*.kondisi' => 'required',
            'data_hardscape.*.keterangan' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_hardscape.*.nama_alat.required' => "Masukan Data Nama Alat ?",
            'data_hardscape.*.tipe.required' => "Masukan Jenis Tipe ?",
            'data_hardscape.*.tahun_perolehan.required' => "Masukan Tahun Diperoleh ?",
            'data_hardscape.*.kondisi.required' => "Masukan Data Kondisi ?",
            'data_hardscape.*.keterangan.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_hardscape as $key => $value){
            Hardscape::create($value);
        }

        $pertamanan_id = $request->data_hardscape[0]['pertamanan_id'];

        return redirect()->action('HardscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Peralatan Hardscape Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hardscape  $hardscape
     * @return \Illuminate\Http\Response
     */
    public function show(Hardscape $hardscape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hardscape  $hardscape
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Hardscape $hardscape)
    {
        return view('PSU_Pertamanan.hardscape.edit',compact('hardscape'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hardscape  $hardscape
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hardscape $hardscape)
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
        Hardscape::where('id', $hardscape->id)->update([
            'nama_alat' => $request->nama_alat,
            'tipe' => $request->tipe,
            'tahun_perolehan' => $request->tahun_perolehan,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->action('HardscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$hardscape->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hardscape  $hardscape
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Hardscape $hardscape)
    {
        $pertamanan_id = $request->get('pertamanan_id');
        Hardscape::destroy($hardscape->id);
        return redirect()->action(
            'HardscapesController@index', ['id' => $pertamanan_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$hardscape->id);
    }
}
