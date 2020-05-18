<?php

namespace App\Http\Controllers;

use App\Pemeliharaan;
use App\Pertamanan;
use Illuminate\Http\Request;

class PemeliharaansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_pemeliharaan = Pemeliharaan::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.pemeliharaan.pemeliharaan', compact('data_pertamanan','data_pemeliharaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'data_pemeliharaan.*.nama_alat' => 'required',
            'data_pemeliharaan.*.tipe' => 'required',
            'data_pemeliharaan.*.tahun_perolehan' => 'required|',
            'data_pemeliharaan.*.kondisi' => 'required',
            'data_pemeliharaan.*.keterangan' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_inventaris.*.nama_alat.required' => "Masukan Data Nama Alat ?",
            'data_inventaris.*.tipe.required' => "Masukan Nama Tipe ?",
            'data_pemeliharaan.*.tahun_perolehan.required' => "Masukan Tahun Diperoleh ?",
            'data_pemeliharaan.*.kondisi.required' => "Masukan Data Kondisi ?",
            'data_pemeliharaan.*.keterangan.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_pemeliharaan as $key => $value){
            Pemeliharaan::create($value);
        }

        $pertamanan_id = $request->data_pemeliharaan[0]['pertamanan_id'];

        return redirect()->action('PemeliharaansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Peralatan Pemeliharaan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        //
        return view('PSU_Pertamanan.pemeliharaan.edit', compact('pemeliharaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
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
        Pemeliharaan::where('id', $pemeliharaan->id)->update([
            'nama_alat' => $request->nama_alat,
            'tipe' => $request->tipe,
            'tahun_perolehan' => $request->tahun_perolehan,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->action('PemeliharaansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$pemeliharaan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemeliharaan  $pemeliharaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Pemeliharaan $pemeliharaan)
    {
        $pertamanan_id = $request->get('pertamanan_id');
        Pemeliharaan::destroy($pemeliharaan->id);
        return redirect()->action(
            'PemeliharaansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$pemeliharaan->id);

    }
}
