<?php

namespace App\Http\Controllers;

use App\KoordinatPertamanan;
use App\Permukiman;
use App\Pertamanan;
use Illuminate\Http\Request;

class KoordinatPertamanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_koordinat_pertamanan = KoordinatPertamanan::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.koordinat.koordinat', compact('data_pertamanan',
            'data_koordinat_pertamanan'));
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
            KoordinatPertamanan::create($value);
        }

        $pertamanan_id = $request->data_koordinat[0]['pertamanan_id'];

        return redirect()->action('KoordinatPertamanansController@index', ['id' => $pertamanan_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatPertamanan  $koordinatPertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //
        $koordinat_pertamanan = KoordinatPertamanan::where('id',$id)->get();
        return view('PSU_Pertamanan.koordinat.peta',compact('koordinat_pertamanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatPertamanan  $koordinatPertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatPertamanan $koordinatPertamanan)
    {
        return view('PSU_Pertamanan.koordinat.edit', compact('koordinatPertamanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatPertamanan  $koordinatPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatPertamanan $koordinatPertamanan)
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

        $pertamanan_id = $request->get('pertamanan_id');
        KoordinatPertamanan::where('id', $koordinatPertamanan->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude
        ]);
        return redirect()->action('KoordinatPertamanansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$koordinatPertamanan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatPertamanan  $koordinatPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, KoordinatPertamanan $koordinatPertamanan)
    {
        $pertamanan_id = $request->get('pertamanan_id');
        KoordinatPertamanan::destroy($koordinatPertamanan->id);
        return redirect()->action(
            'KoordinatPertamanansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinatPertamanan->id);
    }
}
