<?php

namespace App\Http\Controllers;

use App\CCTVPerumahan;
use App\Exports\PerumahanExcel;
use App\FotoJalanSaluran;
use App\FotoPerumahan;
use App\FotoSarana;
use App\FotoTaman;
use App\Imports\PerumahanImport;
use App\JalanSaluran;
use App\Kecamatan;
use App\Kelurahan;
use App\KoordinatJalanSaluran;
use App\KoordinatPerumahan;
use App\KoordinatSarana;
use App\KoordinatTaman;
use App\Perumahans;
use App\PJU;
use App\Saluran;
use App\Sarana;
use App\Taman;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;


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

        $data_sarana = Sarana::all()->count();
        $data_foto_sarana = FotoSarana::all()->count();
        $data_koordinat_sarana = KoordinatSarana::all()->count();


        $data_jalan_saluran = JalanSaluran::all()->count();
        $data_foto_jalan_saluran = FotoJalanSaluran::all()->count();
        $data_koordinat_jalan_saluran = KoordinatJalanSaluran::all()->count();

        $data_taman = Taman::all()->count();
        $data_foto_taman = Taman::all()->count();
        $data_koordinat_taman = Taman::all()->count();


        return view('PSU_Perumahan.index', compact('perumahans', 'kecamatans',
            'status_sudah', 'status_belum', 'status_terlantar', 'total_perumahan',
            'data_sarana', 'data_foto_sarana', 'data_koordinat_sarana',
            'data_jalan_saluran', 'data_foto_jalan_saluran', 'data_koordinat_jalan_saluran',
            'data_taman', 'data_foto_taman', 'data_koordinat_taman'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filter(Request $request)
    {

        $nama_kecamatan = $request->input('kecamatan');
        $nama_kelurahan = $request->input('kelurahan');
        $status = $request->input('status_perumahan');

        $total_perumahan = Perumahans::all()->count();
        $status_sudah = Perumahans::where('status_perumahan', 'Sudah Serah Terima')->count();
        $status_belum = Perumahans::where('status_perumahan', 'Belum Serah Terima')->count();
        $status_terlantar = Perumahans::where('status_perumahan', 'Terlantar')->count();

        if (isset($status) && empty($request->kecamatan) && empty($request->kelurahan)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $perumahan_filter = Perumahans::where('status_perumahan', 'like', "%" . $status . "%")
                ->get();

            return view('PSU_Perumahan.index', compact('perumahan_filter', 'kecamatans',
                'status_belum', 'status_sudah', 'status_terlantar', 'total_perumahan'))
                ->with('dapat', 'Data Ditemukan');
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && empty($status)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $perumahan_filter = Perumahans::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")->get();

            return view('PSU_Perumahan.index', compact('perumahan_filter', 'kecamatans',
                'status_belum', 'status_sudah', 'status_terlantar', 'total_perumahan'));
        }

        if (isset($nama_kecamatan) && isset($nama_kelurahan) && isset($status)) {
            $kecamatans = Kecamatan::all()->sortBy("nama_kecamatan");
            $perumahan_filter = Perumahans::where('kecamatan', 'like', "%" . $nama_kecamatan . "%")
                ->where('kelurahan', 'like', "%" . $nama_kelurahan . "%")
                ->where('status_perumahan', 'like', "%" . $status . "%")->get();

            return view('PSU_Perumahan.index', compact('perumahan_filter', 'kecamatans',
                'status_belum', 'status_sudah', 'status_terlantar', 'total_perumahan'));
        }

        if (empty($nama_kecamatan) && empty($nama_kelurahan) && empty($status)) {
            return redirect('/perumahans');
        }
    }

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
//            'nama_perumahan' => 'required',
//            'nama_pengembang' => 'required',
//            'luas_perumahan' => 'required',
//            'jumlah_perumahan' => 'required',
//            'lokasi' => 'required',
//            'kecamatan' => 'required|not_in:0',
//            'kelurahan' => 'required|not_in:0',
//            'RT' => 'required',
//            'RW' => 'required',
//            'status_perumahan' => 'required|not_in:0',
//            'no_bast' => 'required',
//            'sph' => 'required',
//            'tgl_serah_terima' => 'required',
//            'keterangan' => 'required'
        ]);

//        if($request->hasFile('file_foto')) {
//            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
//            $files = $request->file('file_foto');
//            foreach ($files as $file) {
//                $filename = $file->getClientOriginalName();
//                $extension = $file->getClientOriginalExtension();
//                $check = in_array($extension, $allowedfileExtension);
//                //dd($check);
//                $newName = rand(100000, 1001238912) . "." . $extension;
//                if ($check) {
//                    foreach ($request->file_foto as $photo) {
//                        $filename = $photo->store('/assets/uploads/perumahan/perumahan');
//                        FotoPerumahan::create([
//                            'perumahan_id' => $request->input('id'),
//                            'file_foto' => $filename,
//                        ]);
//                    }
//                }
//            }
//        }


        $input=$request->all();
        $images=array();
        if($files=$request->file('file_foto')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/assets/uploads/perumahan/perumahan',$name);
                $images[]=$name;

                FotoPerumahan::create([
                    'file_foto'=>  implode("|",$images),
                    'perumahan_id' =>$input['id'],
                    //you can put other insertion here
                ]);
            }
        }
        /*Insert your data*/


//        Perumahans::create($request->all());
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
        $data_koordinat_sarana = KoordinatSarana::where('perumahan_id', $perumahan)->get();
        $data_foto_sarana = FotoSarana::where('perumahan_id', $perumahan)->get();

        $data_jalan_saluran = JalanSaluran::where('perumahan_id', $perumahan)->get();
        $data_jalan_saluran_koordinat = JalanSaluran::where('perumahan_id', $perumahan)->get();
        $data_jalan_saluran_foto = JalanSaluran::where('perumahan_id', $perumahan)->get();

        $data_taman = Taman::where('perumahan_id', $perumahan)->get();
        $data_taman_koordinat = KoordinatTaman::where('perumahan_id', $perumahan)->get();
        $data_taman_foto = FotoTaman::where('perumahan_id', $perumahan)->get();

        $data_koordinat_perumahan = KoordinatPerumahan::where('perumahan_id', $perumahan)->get();
        $data_cctv = CCTVPerumahan::where('perumahan_id', $perumahan)->get();
        return view('PSU_Perumahan.show', compact( 'data_perumahan',
            'data_sarana','data_koordinat_sarana','data_foto_sarana',
            'data_jalan_saluran','data_jalan_saluran_koordinat','data_jalan_saluran_foto',
            'data_taman','data_taman_koordinat','data_taman_foto',
            'data_koordinat_perumahan',
            'data_cctv'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Perumahans $perumahans
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $kecamatans = Kecamatan::all()->sortBy('nama_kecamatan');
        $perumahans = Perumahans::find($id);
        $data_siteplan = FotoPerumahan::where('perumahan_id', $id)->get();
        $data_koordinat_perumahan = KoordinatPerumahan::where('perumahan_id', $id)->get();
        $data_sarana = Sarana::where('perumahan_id', $id)->get();
        $data_koordinat_sarana = KoordinatSarana::where('perumahan_id', $id);
        $data_foto_sarana = FotoSarana::where('perumahan_id',$id)->get();
        $data_jalan_saluran = JalanSaluran::where('perumahan_id',$id)->get();
        $data_foto_jalan_saluran = FotoJalanSaluran::where('perumahan_id',$id)->get();
        $data_koordinat_jalan_saluran = KoordinatJalanSaluran::where('perumahan_id',$id)->get();
        $data_taman = Taman::where('perumahan_id',$id)->get();
        $data_foto_taman = FotoTaman::where('perumahan_id',$id)->get();
        $data_koordinat_taman = KoordinatTaman::where('perumahan_id',$id)->get();
        $data_cctv_perumahan = CCTVPerumahan::where('perumahan_id',$id)->get();

        $data_pju = PJU::where('perumahan_id',$id)->get();
        $data_saluran_bersih = Saluran::where('perumahan_id',$id)->get();

        return view('PSU_Perumahan.perumahan.edit', compact('perumahans', 'kecamatans',
            'data_siteplan', 'data_koordinat_perumahan','data_sarana','data_foto_sarana',
            'data_koordinat_sarana','data_jalan_saluran','data_foto_jalan_saluran',
            'data_koordinat_jalan_saluran','data_taman','data_foto_taman','data_koordinat_taman',
            'data_pju','data_saluran_bersih','data_cctv_perumahan'));
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
//            'luas_perumahan' => 'required',
//            'jumlah_perumahan' => 'required',
            'lokasi' => 'required',
            'kecamatan' => 'required|not_in:0',
            'kelurahan' => 'required|not_in:0',
//            'RT' => 'required',
//            'RW' => 'required',
//            'status_perumahan' => 'required|not_in:0',
//            'no_bast' => 'required',
//            'sph' => 'required',
//            'tgl_serah_terima' => 'required',
//            'keterangan' => 'required'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Perumahans $perumahans
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Perumahans $perumahans)
    {
        Perumahans::destroy($perumahans->id);
        DB::table("saranas")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("fotosaranas")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("koordinatsaranas")->where("perumahan_id", $perumahans->id)->delete();

        DB::table("jalansalurans")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("koordinatjalansalurans")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("fotojalansalurans")->where("perumahan_id", $perumahans->id)->delete();

        DB::table("tamans")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("koordinattamans")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("fototamans")->where("perumahan_id", $perumahans->id)->delete();

        DB::table("cctvperumahans")->where("perumahan_id", $perumahans->id)->delete();
        DB::table("koordinatperumahans")->where("perumahan_id", $perumahans->id)->delete();

        return redirect()->action('PerumahansController@index')->with('status', 'Data Berhasil Dihapus Dengan ID : ' . $perumahans->id);
    }

    public function export_excel()
    {
        return Excel::download(new PerumahanExcel, 'perumahan.xlsx');
    }

    public  function import_excel(Request $request)
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
        $path = $file->move('assets/import_data/perumahan/',$nama_file);

        // import data
        Excel::import(new PerumahanImport, public_path('assets/import_data/perumahan/'.$nama_file));

        if (file_exists($path)) {
            unlink($path);
        }
        // notifikasi dengan session


        // alihkan halaman kembali
        return redirect('/perumahans')->with('status','Data Perumahan Sukses Diimports');
    }

}
