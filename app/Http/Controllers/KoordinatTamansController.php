<?php

namespace App\Http\Controllers;

use App\JalanSaluran;
use App\KoordinatJalanSaluran;
use App\KoordinatTaman;
use App\Pertamanan;
use App\Perumahans;
use App\Taman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatTamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_taman = Taman::find($id);
        $koordinat_taman_penghijauan = KoordinatTaman::where('taman_id',$id)->get();
        $data_jalan_saluran= JalanSaluran::find($id);
        $koordinat_jalan_saluran = KoordinatJalanSaluran::where('jalansaluran_id',$id)->get();

        $data_perumahan = Perumahans::find($id);
        $data_koordinat_perumahan = DB::select('SELECT * FROM koordinatperumahans
                                                JOIN perumahans
                                                ON perumahans.id = koordinatperumahans.perumahan_id');


        $data_koordinat_perumahan_group_by = DB::select("SELECT *, COUNT(perumahan_id)
                                                         FROM perumahans
                                                         JOIN koordinatperumahans
                                                         ON perumahans.id = koordinatperumahans.perumahan_id
                                                         GROUP BY koordinatperumahans.perumahan_id
                                                         HAVING COUNT(perumahan_id > 1)");


        $data_koordinat_sarana = DB::select('SELECT * FROM koordinatsaranas
                                             JOIN perumahans
                                             ON perumahans.id = koordinatsaranas.perumahan_id');


        $data_koordinat_sarana_group_by = DB::select('SELECT * FROM koordinatsaranas
                                                      JOIN perumahans
                                                      ON perumahans.id = koordinatsaranas.perumahan_id
                                                      JOIN saranas
                                                      ON saranas.perumahan_id = perumahans.id
                                                      GROUP BY koordinatsaranas.sarana_id');


        $data_koordinat_jalansaluran = DB::select('SELECT * FROM koordinatjalansalurans
                                                   JOIN jalansalurans
                                                   ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id');


        $data_koordinat_jalansaluran_group_by = DB::select('SELECT * FROM koordinatjalansalurans
                                                            JOIN jalansalurans
                                                            ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id
                                                            JOIN perumahans
                                                            ON perumahans.id = jalansalurans.perumahan_id
                                                            GROUP BY koordinatjalansalurans.jalansaluran_id');

        $data_koordinat_taman = DB::select('SELECT * FROM koordinattamans
                                            JOIN tamans
                                            ON tamans.id = koordinattamans.taman_id');


        $data_koordinat_taman_group_by = DB::select('SELECT * FROM koordinattamans
                                                     JOIN tamans
                                                     ON tamans.id = koordinattamans.taman_id
                                                     JOIN perumahans
                                                     ON perumahans.id = tamans.perumahan_id
                                                     GROUP BY koordinattamans.taman_id');

        return view('PSU_Perumahan.taman.koordinat.koordinat_taman',
            compact('data_taman','koordinat_taman_penghijauan','data_jalan_saluran','data_koordinat_perumahan','data_koordinat_perumahan_group_by',
                'data_koordinat_taman','data_koordinat_taman_group_by','data_koordinat_jalansaluran',
                'data_koordinat_sarana','data_koordinat_sarana_group_by','koordinat_jalan_saluran',
                'data_koordinat_jalansaluran_group_by','data_koordinat_taman','data_koordinat_taman_group_by'));
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
//        $rules = [
//            'longitude' => 'required',
//            'latitude' => 'required',
//        ];
//
//        $customMessages = [
//            'required' => 'Masukan Data :attribute ini ?.',
//        ];
//
//        $this->validate($request, $rules, $customMessages);

//        $taman_id = $request->input('taman_id');
//        $longitude = $request->input('longitude');
//        $latitude = $request->input('latitude');
//        $latlong = "[$latitude, $longitude, ],";
//
//        $koordinat_taman = new KoordinatTaman();
//        $koordinat_taman->perumahan_id = $request->input('perumahan_id');
//        $koordinat_taman->taman_id = $request->input('taman_id');
//        $koordinat_taman->longitude = $request->input('longitude');
//        $koordinat_taman->latitude = $request->input('latitude');
//        $koordinat_taman->latlong = $latlong;
//        $koordinat_taman->save();

        $taman_id = $request->input('taman_id');

        foreach ($request->data_koordinat as $key => $value){
            KoordinatTaman::create($value);
        }


        return redirect()->action('KoordinatTamansController@index', ['id' => $taman_id])
            ->with('status','Data Koordinat Taman Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatTaman  $koordinatTaman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $koordinat = KoordinatTaman::where('taman_id',$id)->get();
        $perumahans = Perumahans::select(\DB::raw("SELECT * FROM perumahans a, koordinatperumahans b WHERE a.id = b.perumahan_id"));

        return view ('PSU_Perumahan.taman.koordinat.peta',compact('koordinat','perumahans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatTaman  $koordinatTaman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatTaman $koordinatTaman)
    {
        //
        return view('PSU_Perumahan.taman.koordinat.edit', compact('koordinatTaman'));
    }

    public function showallmaps($perumahan_id)
    {
        $perumahans = Perumahans::find($perumahan_id);
        $data_koordinat_taman = DB::select('SELECT * FROM tamans JOIN koordinattamans ON tamans.id = koordinattamans.taman_id
                                             WHERE koordinattamans.perumahan_id='.$perumahan_id);

        $data_koordinat_taman_group_by = DB::select("SELECT taman_id, nama_taman, nama_perumahan, lokasi, kecamatan,
                                                      kelurahan, luas_taman,
                                                      kondisi_taman,longitude,latitude,COUNT(taman_id)
                                                      FROM tamans
                                                      JOIN koordinattamans ON tamans.id = koordinattamans.taman_id
                                                      JOIN perumahans ON tamans.perumahan_id = perumahans.id
                                                      WHERE koordinattamans.perumahan_id ='$perumahan_id'
                                                      GROUP BY koordinattamans.taman_id
                                                      HAVING COUNT(taman_id > 1)");
        return view ('PSU_Perumahan.detail_data_perumahan.detail_koordinat_taman',
            compact('data_koordinat_taman','data_koordinat_taman_group_by','perumahans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatTaman  $koordinatTaman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatTaman $koordinatTaman)
    {
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $taman_id = $request->get('taman_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        KoordinatTaman::where('id', $koordinatTaman->id)->update([
            'longitude' => $longitude,
            'latitude' => $latitude
        ]);
        return redirect()->action('KoordinatTamansController@index', ['id' => $taman_id])
            ->with('status','Data Dengan ID '.$koordinatTaman->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatTaman  $koordinatTaman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, KoordinatTaman $koordinatTaman)
    {
        //
        $taman_id = $request->get('taman_id');
        KoordinatTaman::destroy($koordinatTaman->id);
        return redirect()->action(
            'KoordinatTamansController@index', ['id' => $taman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinatTaman->id);
    }
}
