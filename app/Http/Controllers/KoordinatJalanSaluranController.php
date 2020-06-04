<?php

namespace App\Http\Controllers;

use App\FotoJalanSaluran;
use App\JalanSaluran;
use App\KoordinatJalanSaluran;
use Illuminate\Http\Request;

class KoordinatJalanSaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {

        $data_jalan_saluran= JalanSaluran::find($id);
        $data_koordinat_jalansaluran = KoordinatJalanSaluran::where('jalansaluran_id',$id)->get();
        return view('PSU_Perumahan.jalansaluran.koordinat.koordinat_jalan_saluran',
            compact('data_jalan_saluran','data_koordinat_jalansaluran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        $jalansaluran_id = $request->input('jalansaluran_id');

        foreach ($request->data_koordinat as $key => $value){
            KoordinatJalanSaluran::create($value);
        }


        return redirect()->action('KoordinatJalanSaluranController@index', ['id' => $jalansaluran_id])
            ->with('status','Data Koordinat jalan Saluran Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $koordinat = KoordinatJalanSaluran::where('jalansaluran_id',$id)->get();
        return view ('PSU_Perumahan.jalansaluran.koordinat.peta',compact('koordinat'));
    }

    public function showallmaps()
    {
        $koordinat = KoordinatJalanSaluran::all();
        return view ('PSU_Perumahan.sarana.koordinat.peta',compact('koordinat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        return view('PSU_Perumahan.jalansaluran.koordinat.edit', compact('koordinatJalanSaluran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $jalansaluran_id = $request->get('jalansaluran_id');
        KoordinatJalanSaluran::where('id', $koordinatJalanSaluran->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        return redirect()->action('KoordinatJalanSaluranController@index', ['id' => $jalansaluran_id])
            ->with('status','Data Dengan ID '.$koordinatJalanSaluran->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        $jalansaluran_id = $request->get('jalansaluran_id');
        KoordinatJalanSaluran::destroy($koordinatJalanSaluran->id);

        return redirect()->action(
            'KoordinatJalanSaluranController@index', ['id' => $jalansaluran_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinatJalanSaluran->id);
    }
}
