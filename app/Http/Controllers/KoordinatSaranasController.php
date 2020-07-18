<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use App\KoordinatPerumahan;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoordinatSaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //

        $data_sarana = Sarana::find($id);
        $data_koordinat = KoordinatSarana::where('sarana_id',$id)->get();
        return view('PSU_Perumahan.sarana.koordinat.koordinat_sarana',
            compact('data_sarana','data_koordinat'));
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
//
//
//        $longitude = $request->input('longitude');
//        $latitude = $request->input('latitude');
//        $latlong = "[$latitude, $longitude, ],";
//
//        $koordinat_sarana = new KoordinatSarana();
//        $koordinat_sarana->perumahan_id = $request->input('perumahan_id');
//        $koordinat_sarana->sarana_id = $request->input('sarana_id');
//        $koordinat_sarana->longitude = $request->input('longitude');
//        $koordinat_sarana->latitude = $request->input('latitude');
//        $koordinat_sarana->latlong = $latlong;
//        $koordinat_sarana->save();

        $sarana_id = $request->input('sarana_id');
        foreach ($request->data_koordinat as $key => $value){
            KoordinatSarana::create($value);
        }



        return redirect()->action('KoordinatSaranasController@index', ['id' => $sarana_id])
            ->with('status','Data Koordinat Sarana Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $koordinat = KoordinatSarana::where('sarana_id',$id)->get();
        $perumahans = Perumahans::select(\DB::raw("SELECT * FROM perumahans a, koordinatperumahans b WHERE a.id = b.perumahan_id"));

        return view ('PSU_Perumahan.sarana.koordinat.peta',compact('koordinat','perumahans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatSarana $koordinatSarana)
    {
        return view('PSU_Perumahan.sarana.koordinat.edit', compact('koordinatSarana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatSarana $koordinatSarana)
    {
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $latlong = "[$latitude, $longitude, ],";
        KoordinatSarana::where('id', $koordinatSarana->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'latlong' => $latlong
        ]);
        return redirect()->action('KoordinatSaranasController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$koordinatSarana->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, KoordinatSarana $koordinatsarana)
    {
        $sarana_id = $request->get('sarana_id');
        KoordinatSarana::destroy($koordinatsarana->id);
        return redirect()->action(
            'KoordinatSaranasController@index', ['id' => $sarana_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinatsarana->id);
    }


    public function petasarana($perumahan_id)
    {
        $data_koordinat_sarana = DB::select('SELECT * FROM saranas JOIN koordinatsaranas ON saranas.id = koordinatsaranas.sarana_id
                                             WHERE koordinatsaranas.perumahan_id='.$perumahan_id);

        $data_koordinat_sarana_group_by = DB::select("SELECT sarana_id, nama_sarana, COUNT(sarana_id)
                                                      FROM saranas JOIN koordinatsaranas ON saranas.id = koordinatsaranas.sarana_id
                                                      WHERE koordinatsaranas.perumahan_id ='$perumahan_id'
                                                      GROUP BY koordinatsaranas.sarana_id
                                                      HAVING COUNT(sarana_id > 1)");
        return view ('PSU_Perumahan.detail_data_perumahan.detail_koordinat_sarana',
               compact('data_koordinat_sarana','data_koordinat_sarana_group_by'));
    }

}
