<?php

namespace App\Http\Controllers;

use App\FotoTaman;
use App\KoordinatTaman;
use App\Perumahans;
use App\Taman;
use Illuminate\Http\Request;

class TamansController extends Controller
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
        $data_taman = Taman::where('perumahan_id',$id)->get();
        $data_foto_taman = FotoTaman::where('perumahan_id',$id)->get();
        $data_koordinat_taman = KoordinatTaman::where('perumahan_id',$id)->get();
        return view('PSU_Perumahan.taman.index', compact('data_perumahan','data_taman',
            'data_foto_taman','data_koordinat_taman'));

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
            'data_taman.*.nama_taman' => 'required',
            'data_taman.*.luas_taman' => 'required',
            'data_taman.*.kondisi_taman' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_taman.*.nama_taman.required' => "Masukan Data Nama Taman ?",
            'data_taman.*.luas_taman.required' => "Masukan Data Luas Taman ?",
            'data_taman.*.kondisi_taman.required' => "Masukan Data Kondisi Taman ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_taman as $key => $value){
            Taman::create($value);
        }

        $perumahan_id = $request->data_taman[0]['perumahan_id'];
        return redirect()->action('TamansController@index', ['id' => $perumahan_id])
            ->with('status','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\Response
     */
    public function show(Taman $taman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taman  $taman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Taman $taman)
    {
        return view('PSU_Perumahan.taman.edit', compact('taman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Taman $taman)
    {
        $rules = [
            'nama_taman' => 'required',
            'luas_taman' => 'required',
            'kondisi_taman' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Taman::where('id', $taman->id)->update([
            'nama_taman' => $request->nama_taman,
            'luas_taman' => $request->luas_taman,
            'kondisi_taman' => $request->kondisi_taman
        ]);
        return redirect()->action('TamansController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$taman->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taman  $taman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Taman $taman)
    {

        $perumahan_id = $request->get('perumahan_id');
        Taman::destroy($taman->id);
        return redirect()->action('TamansController@index', ['id' => $perumahan_id])
            ->with('status','Data Dengan ID '.$taman->id.' Berhasil Dihapus');
    }
}
