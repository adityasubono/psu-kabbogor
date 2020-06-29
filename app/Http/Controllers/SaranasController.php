<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;

class SaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_perumahan = Perumahans::find($id);
        $data_sarana = Sarana::where('perumahan_id',$id)->get();
        $data_foto_sarana = FotoSarana::where('perumahan_id',$id)->get();
        $data_koordinat_sarana = KoordinatSarana::where('perumahan_id',$id)->get();
        return view('PSU_Perumahan.sarana.index', compact('data_perumahan','data_sarana',
        'data_foto_sarana','data_koordinat_sarana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
            'data_sarana.*.nama_sarana' => 'required',
            'data_sarana.*.luas_sarana' => 'required',
            'data_sarana.*.kondisi_sarana' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_sarana.*.nama_sarana.required' => "Masukan Data Nama Sarana ?",
            'data_sarana.*.luas_sarana.required' => "Masukan Data Luas Sarana ?",
            'data_sarana.*.kondisi_sarana.required' => "Masukan Data Kondisi Sarana ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_sarana as $key => $value){
            Sarana::create($value);
        }

        $perumahan_id = $request->data_sarana[0]['perumahan_id'];
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Sarana Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Sarana $sarana)
    {
        return view('PSU_Perumahan.sarana.edit', compact('sarana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sarana $sarana)
    {
        $rules = [
            'nama_sarana' => 'required',
            'luas_sarana' => 'required',
            'kondisi_sarana' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Sarana::where('id', $sarana->id)->update([
            'nama_sarana' => $request->nama_sarana,
            'luas_sarana' => $request->luas_sarana,
            'kondisi_sarana' => $request->kondisi_sarana
        ]);
        return redirect()->action('SaranasController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$sarana->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Sarana $sarana)
    {

        $perumahan_id = $request->get('perumahan_id');
        Sarana::destroy($sarana->id);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Sarana Dengan ID '.$sarana->id.' Berhasil Dihapus');
    }
}
