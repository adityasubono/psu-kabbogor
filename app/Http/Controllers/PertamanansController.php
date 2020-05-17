<?php

namespace App\Http\Controllers;

use App\Hardscape;
use App\Kecamatan;
use App\Pertamanan;
use App\Perumahans;
use App\Petugas;
use App\Softscape;
use Illuminate\Http\Request;

class PertamanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pertamanans= Pertamanan::all();
        $jumlah_hardscape= Hardscape::all()->count();
        $jumlah_softscape= Softscape::all()->count();
        $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");

        $total_hs= $jumlah_softscape + $jumlah_hardscape;


        return view('PSU_Pertamanan.index', compact('pertamanans','kecamatans'
        ,'jumlah_hardscape','jumlah_softscape','total_hs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $pertamanan_id = Pertamanan::all()->sortByDesc('id')->take(1);

        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Pertamanan.create', compact('kecamatans','pertamanan_id'));

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
            'nama_taman' => 'required',
            'nama_pelaksana' => 'required',
            'luas_taman' => 'required',
            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
            'RT' => 'required',
            'RW' => 'required',
            'tahun_dibangun' => 'required|not_in:0',
            'keterangan' => 'required',
            'data_petugas.*.nama' => 'required',
            'data_petugas.*.umur' => 'required',
            'data_petugas.*.pendidikan' => 'required',
            'data_petugas.*.tugas' => 'required',
            'data_petugas.*.keterangan_petugas' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_petugas.*.nama.required' => "Masukan Data Nama Petugas ?",
            'data_petugas.*.umur.required' => "Masukan Data Umur ?",
            'data_petugas.*.pendidikan.required' => "Masukan Data Pendidikan Terakhir ?",
            'data_petugas.*.tugas.required' => "Masukan Data Deskripsi Tugas Yang Dilakukan ?",
            'data_petugas.*.keterangan_petugas.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        Pertamanan::create($request->all());

        foreach ($request->data_petugas as $key => $value){
            Petugas::create($value);
        }


        return redirect('/pertamanans')->with('status','Data Success Insert');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertamanan  $pertamanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertamanan $pertamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertamanan  $pertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Pertamanan $pertamanan)
    {
        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Pertamanan.pertamanan.edit', compact('pertamanan','kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertamanan  $pertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pertamanan $pertamanan)
    {
        $rules = [
            'nama_taman' => 'required',
            'nama_pelaksana' => 'required',
            'luas_taman' => 'required',
            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
            'RT' => 'required',
            'RW' => 'required',
            'tahun_dibangun' => 'required|not_in:0',
            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        Pertamanan::where('id', $pertamanan->id)->update([
            'nama_taman' => $request->nama_taman,
            'nama_pelaksana' => $request->nama_pelaksana,
            'luas_taman' => $request->luas_taman,
            'tahun_dibangun' => $request->tahun_dibangun,
            'lokasi' => $request->lokasi,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'keterangan' => $request->keterangan

        ]);

        return redirect()->action('PertamanansController@index')
            ->with('status','Data Dengan ID '.$pertamanan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertamanan  $pertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pertamanan $pertamanan)
    {
        Pertamanan::destroy($pertamanan->id);
        return redirect()->action(
            'PertamanansController@index')
            ->with('status','Data Dengan ID '.$pertamanan->id.' Berhasil Dihapus');
    }
}
