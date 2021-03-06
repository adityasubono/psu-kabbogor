<?php

namespace App\Http\Controllers;

use App\CCTVPermukiman;
use App\Exports\PermukimanExport;
use App\Fototpu;
use App\Imports\PermukimanImport;
use App\Inventaris;
use App\Kecamatan;
use App\Koordinattpu;
use App\Pengelola;
use App\Permukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Maatwebsite\Excel\Facades\Excel;

class PermukimansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $permukimans = Permukiman::all();
        $kecamatans  = Kecamatan::all()->sortBy("nama_kecamatan");
        $status_sudah = Permukiman::where('status','Sudah Beroperasional')->count();
        $status_belum = Permukiman::where('status','Belum Beroperasional')->count();

        return view('PSU_Permukiman.index', compact('permukimans','kecamatans',
            'status_sudah','status_belum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $permukiman_id = Permukiman::all()->sortByDesc('id')->take(1);

        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Permukiman.create', compact('kecamatans','permukiman_id'));

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
            'nama_tpu' => 'required',
            'luas_tpu' => 'required',
//            'daya_tampung' => 'required',
//            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
//            'RT' => 'required',
//            'RW' => 'required',
            'tahun_digunakan' => 'required',
            'status' => 'required|not_in:0',
//            'kondisi' => 'required|not_in:0',
//            'keterangan_status' => 'required',
//            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        Permukiman::create($request->all());
        return redirect('/permukimans')->with('status','Data Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permukiman  $permukiman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $data_permukiman = Permukiman::find($id);
        $data_pengelola = Pengelola::where('permukiman_id', $id)->get();
        $data_foto_tpu = Fototpu::where('permukiman_id', $id)->get();
        $data_inventaris = Inventaris::where('permukiman_id', $id)->get();
        $data_koordinat_tpu = Koordinattpu::where('permukiman_id', $id)->get();
        $data_cctv_tpu = CCTVPermukiman::where('permukiman_id', $id)->get();


        return view('PSU_Permukiman.show',compact('data_permukiman','data_pengelola',
        'data_foto_tpu','data_inventaris','data_koordinat_tpu','data_cctv_tpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permukiman  $permukiman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permukiman $permukiman)
    {
        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        return view('PSU_Permukiman.permukiman.edit', compact('permukiman',
        'kecamatans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permukiman  $permukiman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Permukiman $permukiman)
    {

        $rules = [
            'nama_tpu' => 'required',
            'luas_tpu' => 'required',
//            'daya_tampung' => 'required',
//            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
            'RT' => 'required',
            'RW' => 'required',
            'tahun_digunakan' => 'required',
            'status' => 'required|not_in:0',
//            'kondisi' => 'required|not_in:0',
//            'keterangan_status' => 'required',
//            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        Permukiman::where('id', $permukiman->id)->update([
            'nama_tpu' => $request->nama_tpu,
            'luas_tpu' => $request->luas_tpu,
            'daya_tampung' => $request->daya_tampung,
            'tahun_digunakan' => $request->tahun_digunakan,
            'lokasi' => $request->lokasi,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
//            'RW' => $request->RW,
//            'RT' => $request->RT,
            'status' => $request->status,
            'kondisi' => $request->kondisi,
            'keterangan_status' => $request->keterangan_status,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/permukimans')->with('status','Data Success Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permukiman  $permukiman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        DB::table("permukimans")->where("id", $id)->delete();
        DB::table("pengelolas")->where("permukiman_id", $id)->delete();
        DB::table("fototpus")->where("permukiman_id", $id)->delete();
        DB::table("inventaris")->where("permukiman_id", $id)->delete();
        DB::table("koordinattpus")->where("permukiman_id", $id)->delete();
        DB::table("cctvpermukimans")->where("permukiman_id", $id)->delete();

        return redirect()->action('PermukimansController@index')
            ->with('status','Data Permukiman Berhasil Dihapus');
    }

    public function filter(Request $request)
    {

        $nama_kecamatan = $request->input('kecamatan');
        $nama_kelurahan = $request->input('kelurahan');
        $status = $request->input('status');
        $status_sudah = Permukiman::where('status','Sudah Beroperasional')->count();
        $status_belum = Permukiman::where('status','Belum Beroperasional')->count();


        if (isset($status) && empty($request->kecamatan) && empty($request->kelurahan)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $permukiman_filter = Permukiman::where('status', 'like', "%" . $status . "%")->get();

            return view('PSU_Permukiman.index', compact('permukiman_filter', 'kecamatans',
            'status_sudah','status_belum'))
                ->with('status', 'Data Berhasil Ditemukan');
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && empty($status)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $permukiman_filter = Permukiman::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")->get();

            return view('PSU_Permukiman.index', compact('permukiman_filter', 'kecamatans',
            'status_belum','status_sudah'));
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && isset($status)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $permukiman_filter = Permukiman::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")
                ->where('status', 'like', "%" . $status . "%")->get();

            return view('PSU_Permukiman.index', compact('permukiman_filter', 'kecamatans',
                'status_sudah','status_belum'));
        }

        if (empty($nama_kecamatan) && empty($nama_kelurahan) && empty($status)) {
            return redirect('/permukimans');
        }
    }

    public function export() {
        return Excel::download(new PermukimanExport, 'permukiman.xlsx');
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
        $path = $file->move('assets/import_data/permukiman/',$nama_file);

        // import data
        Excel::import(new PermukimanImport, public_path('assets/import_data/permukiman/'.$nama_file));

        if (file_exists($path)) {
            unlink($path);
        }
        // notifikasi dengan session


        // alihkan halaman kembali
        return redirect('/permukimans')->with('status','Data Permukiman Sukses Diimports');
    }
}
