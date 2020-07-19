<?php

namespace App\Http\Controllers;

use App\CCTVPertamanan;
use App\Exports\PertamananExport;
use App\FotoPertamanan;
use App\FotoTaman;
use App\Hardscape;
use App\Imports\PertamananImport;
use App\Kecamatan;
use App\KoordinatPertamanan;
use App\KoordinatTaman;
use App\Pemeliharaan;
use App\Pertamanan;
use App\Perumahans;
use App\Petugas;
use App\Softscape;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $total_data= Pertamanan::all()->count();
        $jumlah_hardscape= Hardscape::all()->count();
        $jumlah_softscape= Softscape::all()->count();
        $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");

        $total_hs= $jumlah_softscape + $jumlah_hardscape;


        return view('PSU_Pertamanan.index', compact('pertamanans','kecamatans'
        ,'jumlah_hardscape','jumlah_softscape','total_hs','total_data'));
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
//            'luas_taman' => 'required',
//            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
//            'RT' => 'required',
//            'RW' => 'required',
            'tahun_dibangun' => 'required|not_in:0',
//            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        Pertamanan::create($request->all());

        return redirect('/pertamanans')->with('status','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertamanan  $pertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Pertamanan $pertamanan)
    {
        $data_pertamanan = Pertamanan::find($pertamanan->id);
        $data_petugas = Petugas::where('pertamanan_id',$pertamanan->id)->get();
        $data_foto_taman = FotoPertamanan::where('pertamanan_id',$pertamanan->id)->get();
        $data_pemeliharaan = Pemeliharaan::where('pertamanan_id',$pertamanan->id)->get();
        $data_hardscape = Hardscape::where('pertamanan_id',$pertamanan->id)->get();
        $data_softscape = Softscape::where('pertamanan_id',$pertamanan->id)->get();
        $data_koordinat_taman = KoordinatPertamanan::where('pertamanan_id',$pertamanan->id)->get();
        $data_cctv_taman = CCTVPertamanan::where('pertamanan_id',$pertamanan->id)->get();

        return view('PSU_Pertamanan.show', compact('data_pertamanan',
        'data_petugas','data_foto_taman','data_pemeliharaan','data_hardscape',
        'data_softscape','data_koordinat_taman','data_cctv_taman'));
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
//            'RT' => 'required',
//            'RW' => 'required',
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
//            'luas_taman' => $request->luas_taman,
            'tahun_dibangun' => $request->tahun_dibangun,
//            'lokasi' => $request->lokasi,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
//            'RT' => $request->RT,
//            'RW' => $request->RW,
//            'keterangan' => $request->keterangan

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
        Petugas::where('pertamanan_id',$pertamanan->id)->delete();
        FotoPertamanan::where('pertamanan_id',$pertamanan->id)->delete();
        Pemeliharaan::where('pertamanan_id',$pertamanan->id)->delete();
        Hardscape::where('pertamanan_id',$pertamanan->id)->delete();
        Softscape::where('pertamanan_id',$pertamanan->id)->delete();
        KoordinatPertamanan::where('pertamanan_id',$pertamanan->id)->delete();
        CCTVPertamanan::where('pertamanan_id',$pertamanan->id)->delete();

        return redirect('/pertamanans')->with('status','Data Pertamanan Berhasil Dihapus');
    }

    public function filter(Request $request)
    {

        $nama_kecamatan = $request->input('kecamatan');
        $nama_kelurahan = $request->input('kelurahan');
        $tahun_dibangun = $request->input('tahun');

        $total_data= Pertamanan::all()->count();
        $jumlah_hardscape= Hardscape::all()->count();
        $jumlah_softscape= Softscape::all()->count();
        $total_hs= $jumlah_softscape + $jumlah_hardscape;
        if (isset($tahun_dibangun) && empty($request->kecamatan) && empty($request->kelurahan)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $pertamanan_filter = Pertamanan::where('tahun_dibangun', 'like', "%" . $tahun_dibangun . "%")
                ->get();

            return view('PSU_Pertamanan.index', compact('pertamanan_filter', 'kecamatans',
            'total_data','jumlah_hardscape','jumlah_softscape','total_hs'))
                ->with('dapat', 'Data Ditemukan');
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && empty($tahun_dibangun)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $pertamanan_filter = Pertamanan::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")->get();

            return view('PSU_Pertamanan.index', compact('pertamanan_filter', 'kecamatans',
                'total_data','jumlah_hardscape','jumlah_softscape','total_hs'));
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && isset($tahun_dibangun)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $pertamanan_filter = Pertamanan::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")
                ->where('tahun_dibangun', 'like', "%" . $tahun_dibangun . "%")->get();

            return view('PSU_Pertamanan.index', compact('pertamanan_filter', 'kecamatans',
                'total_data','jumlah_hardscape','jumlah_softscape','total_hs'));
        }

        if (empty($nama_kecamatan) && empty($nama_kelurahan) && empty($tahun_dibangun)) {
            return redirect('/pertamanans');
        }
    }

    public function export() {
        return Excel::download(new PertamananExport, 'pertamanan.xlsx');
    }

    public  function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file_import' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file_import');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $path = $file->move('assets/import_data/pertamanan/',$nama_file);

        // import data
        Excel::import(new PertamananImport, public_path('assets/import_data/pertamanan/'.$nama_file));

        if (file_exists($path)) {
            unlink($path);
        }
        // notifikasi dengan session


        // alihkan halaman kembali
        return redirect('/pertamanans')->with('status','Data Permukiman Sukses Diimports');
    }
}
