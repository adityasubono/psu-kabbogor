<?php

namespace App\Http\Controllers;

use App\FotoJalanSaluran;
use App\FotoSarana;
use App\JalanSaluran;
use App\KoordinatJalanSaluran;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;

class JalanSaluransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //
        $data_perumahan = Perumahans::find($id);
        $data_jalan_saluran = JalanSaluran::where('perumahan_id',$id)->get();
        $data_foto_jalan_saluran = FotoJalanSaluran::where('perumahan_id',$id)->get();
        $data_koordinat_jalan_saluran = KoordinatJalanSaluran::where('perumahan_id',$id)->get();

        return view('PSU_Perumahan.jalansaluran.index', compact('data_perumahan','data_jalan_saluran',
            'data_foto_jalan_saluran','data_koordinat_jalan_saluran'));
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
        $rules = [
            'data_jalan_saluran.*.nama_jalan_saluran' => 'required',
            'data_jalan_saluran.*.luas_jalan_saluran' => 'required',
            'data_jalan_saluran.*.kondisi_jalan_saluran' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_jalan_saluran.*.nama_jalan_saluran.required' => "Masukan Data Nama Jalan Saluran ?",
            'data_jalan_saluran.*.luas_jalan_saluran.required' => "Masukan Data Luas Jalan Saluran ?",
            'data_jalan_saluran.*.kondisi_jalan_saluran.required' => "Masukan Data Kondisi Jalan Saluran ?",
        ];
        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_jalan_saluran as $key => $value){
            JalanSaluran::create($value);
        }
        $perumahan_id = $request->data_jalan_saluran[0]['perumahan_id'];

        return redirect()->action('JalanSaluransController@index', ['id' => $perumahan_id])
            ->with('status','Data Jalan Saluran Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function show(JalanSaluran $jalanSaluran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(JalanSaluran $jalanSaluran)
    {
        return view('PSU_Perumahan.jalansaluran.edit', compact('jalanSaluran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, JalanSaluran $jalanSaluran)
    {
        $rules = [
            'nama_jalan_saluran' => 'required',
            'luas_jalan_saluran' => 'required',
            'kondisi_jalan_saluran' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        JalanSaluran::where('id', $jalanSaluran->id)->update([
            'nama_jalan_saluran' => $request->nama_jalan_saluran,
            'luas_jalan_saluran' => $request->luas_jalan_saluran,
            'kondisi_jalan_saluran' => $request->kondisi_jalan_saluran
        ]);
        return redirect()->action('JalanSaluransController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$jalanSaluran->id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JalanSaluran  $jalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, JalanSaluran $jalanSaluran)
    {
        $perumahan_id = $request->get('perumahan_id');
        JalanSaluran::destroy($jalanSaluran->id);
        return redirect()->action('JalanSaluransController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$jalanSaluran->id.' Berhasil Dihapus');
    }
}
