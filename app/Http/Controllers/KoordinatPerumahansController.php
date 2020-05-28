<?php

namespace App\Http\Controllers;

use App\KoordinatPerumahan;
use App\Perumahans;
use Illuminate\Http\Request;

class KoordinatPerumahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_perumahan = Perumahans::find($id);
        $data_koordinat_perumahan = KoordinatPerumahan::where('perumahan_id',$id)->get();

        return view('PSU_Perumahan.koordinat_perumahan.koordinat_perumahan',
            compact('data_perumahan', 'data_koordinat_perumahan'));
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
        //
        $rules = [
            'data_koordinat.*.longitude' => 'required',
            'data_koordinat.*.latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_koordinat.*.longitude.required' => "Masukan Koordinat Longitude ?",
            'data_koordinat.*.latitude.required' => "Masukan Koordinat Latitude ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_koordinat as $key => $value){
            KoordinatPerumahan::create($value);
        }

        $perumahan_id = $request->data_koordinat[0]['perumahan_id'];

        return redirect()->action('KoordinatPerumahansController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$perumahan_id.' Berhasil Di Update');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(KoordinatPerumahan $koordinatPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatPerumahan $koordinatPerumahan)
    {
        //
        return view('PSU_Perumahan.koordinat_perumahan.edit', compact('koordinatPerumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatPerumahan $koordinatPerumahan)
    {
        //
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        KoordinatPerumahan::where('id', $koordinatPerumahan->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude
        ]);
        return redirect()->action('KoordinatPerumahansController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$koordinatPerumahan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, KoordinatPerumahan $koordinatPerumahan)
    {
        //
        $perumahan_id = $request->get('perumahan_id');
        KoordinatPerumahan::destroy($koordinatPerumahan->id);
        return redirect()->action(
            'KoordinatPerumahansController@index', ['id' => $perumahan_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinatPerumahan->id);
    }
}
