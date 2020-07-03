<?php

namespace App\Http\Controllers;

use App\KoordinatTaman;
use App\Pertamanan;
use App\Perumahans;
use App\Taman;
use Illuminate\Http\Request;

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
        $data_koordinat_taman = KoordinatTaman::where('taman_id',$id)->get();
        return view('PSU_Perumahan.taman.koordinat.koordinat_taman',
            compact('data_taman','data_koordinat_taman'));
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

    public function showallmaps()
    {
        $koordinat = KoordinatTaman::all();
        return view ('PSU_Perumahan.sarana.koordinat.peta',compact('koordinat'));
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
