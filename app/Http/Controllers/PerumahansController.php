<?php

namespace App\Http\Controllers;

use App\CCTVPerumahan;
use App\FotoJalanSaluran;
use App\FotoSarana;
use App\JalanSaluran;
use App\Kecamatan;
use App\KoordinatJalanSaluran;
use App\KoordinatPerumahan;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use App\Taman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PerumahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $perumahans = Perumahans::all();
        $total_perumahan = Perumahans::all()->count();
        $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
        $status_sudah = Perumahans::where('status_perumahan', 'Sudah Serah Terima')->count();
        $status_belum = Perumahans::where('status_perumahan', 'Belum Serah Terima')->count();
        $status_terlantar = Perumahans::where('status_perumahan', 'Terlantar')->count();

        $data_sarana =  Sarana::all()->count();
        $data_foto_sarana =  FotoSarana::all()->count();
        $data_koordinat_sarana =  KoordinatSarana::all()->count();


        $data_jalan_saluran =  JalanSaluran::all()->count();
        $data_foto_jalan_saluran =  FotoJalanSaluran::all()->count();
        $data_koordinat_jalan_saluran =  KoordinatJalanSaluran::all()->count();

        $data_taman =  Taman::all()->count();
        $data_foto_taman =  Taman::all()->count();
        $data_koordinat_taman =  Taman::all()->count();



        return view('PSU_Perumahan.index', compact('perumahans', 'kecamatans',
            'status_sudah', 'status_belum', 'status_terlantar', 'total_perumahan',
        'data_sarana','data_foto_sarana','data_koordinat_sarana',
        'data_jalan_saluran','data_foto_jalan_saluran','data_koordinat_jalan_saluran',
        'data_taman','data_foto_taman','data_koordinat_taman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $perumahan_id = Perumahans::all()->sortByDesc('id')->take(1);

        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Perumahan.create', compact('kecamatans', 'perumahan_id'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perumahan' => 'required',
            'nama_pengembang' => 'required',
            'luas_perumahan' => 'required',
            'jumlah_perumahan' => 'required',
            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
            'RT' => 'required',
            'RW' => 'required',
            'status_perumahan' => 'required|not_in:0',
//            'no_bast' => 'required',
//            'sph' => 'required',
//            'tgl_serah_terima' => 'required',
            'keterangan' => 'required'
        ]);
        Perumahans::create($request->all());

//        foreach ($request->data_sarana as $key => $value){
//            Sarana::create($value);
//        }
//
//        foreach ($request->data_jalan_saluran as $key => $value){
//            JalanSaluran::create($value);
//        }
//
//        foreach ($request->data_taman as $key => $value){
//            Taman::create($value);
//        }
//
//        foreach ($request->data_koordinat as $key => $value){
//            KoordinatPerumahan::create($value);
//        }
//
//        foreach ($request->data_cctv as $key => $value){
//            CCTVPerumahan::create($value);
//        }

        return redirect('/perumahans')->with('status', 'Data Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Perumahans $perumahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Perumahans $perumahan)
    {
        $data_sarana = Sarana::where('perumahan_id', $perumahan);
        return view('PSU_Perumahan.show', compact('perumahan', 'data_sarana'));
    }

    public function detailPerumahan($perumahan)
    {

        $data_perumahan = Perumahans::find($perumahan);
        $data_sarana = Sarana::where('perumahan_id', $perumahan)->get();
        $data_jalan_saluran = JalanSaluran::where('perumahan_id', $perumahan)->get();
        $data_taman = Taman::where('perumahan_id', $perumahan)->get();
        $data_koordinat_perumahan = KoordinatPerumahan::where('perumahan_id', $perumahan)->get();
        $data_cctv = CCTVPerumahan::where('perumahan_id', $perumahan)->get();
        return view('PSU_Perumahan.show', compact('data_sarana', 'data_perumahan',
            'data_jalan_saluran', 'data_taman', 'data_koordinat_perumahan', 'data_cctv'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Perumahans $perumahans
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(Perumahans $perumahans)
    {
        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Perumahan.perumahan.edit', compact('perumahans', 'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Perumahans $perumahans
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Perumahans $perumahans)
    {
        $request->validate([
            'nama_perumahan' => 'required',
            'nama_pengembang' => 'required',
            'luas_perumahan' => 'required',
            'jumlah_perumahan' => 'required',
            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
            'RT' => 'required',
            'RW' => 'required',
            'status_perumahan' => 'required|not_in:0',
//            'no_bast' => 'required',
//            'sph' => 'required',
//            'tgl_serah_terima' => 'required',
            'keterangan' => 'required'
        ]);

        Perumahans::where('id', $perumahans->id)->update([
            'nama_perumahan' => $request->nama_perumahan,
            'nama_pengembang' => $request->nama_pengembang,
            'luas_perumahan' => $request->luas_perumahan,
            'jumlah_perumahan' => $request->jumlah_perumahan,
            'lokasi' => $request->lokasi,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'status_perumahan' => $request->status_perumahan,
            'keterangan' => $request->keterangan

        ]);

        return redirect()->action('PerumahansController@index')
            ->with('status', 'Data Dengan ID ' . $perumahans->id . ' Berhasil Di Update');

    }

    public function filterTablePerumahan(Request $request)
    {
        $kecamatan = $request->input('kecamatan');
        $perumahans_cari = Perumahans::where('kecamatan', 'like', "%" . $kecamatan . "%")->get();

        return view('PSU_Perumahan.index', compact('perumahans_cari'));
//        return response()->json($perumahans->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Perumahans $perumahans
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Perumahans $perumahans)
    {
        Perumahans::destroy($perumahans->id);
        return redirect()->action(
            'PerumahansController@index', ['id' => $perumahans])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$perumahans->id);
    }
}
