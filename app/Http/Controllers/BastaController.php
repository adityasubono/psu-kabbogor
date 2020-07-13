<?php

namespace App\Http\Controllers;

use App\Bast;
use App\Basta;
use Illuminate\Http\Request;

class BastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'perumahan_id' => 'required',
            'no_basta' => 'required',
            'tanggal_basta' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);
        $perumahan_id = $request->get('perumahan_id');
        Basta::create([
            'perumahan_id' => $request->input('perumahan_id'),
            'no_basta' => $request->input('no_basta'),
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->get('tanggal_basta')))
        ]);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data BASTA Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basta  $basta
     * @return \Illuminate\Http\Response
     */
    public function show(Basta $basta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basta  $basta
     * @return \Illuminate\Http\Response
     */
    public function edit(Basta $basta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basta  $basta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perumahan_id' => 'required',
            'no_basta' => 'required',
            'tanggal_basta' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');

        Basta::where('id',$id)->update([
            'perumahan_id' => $request->perumahan_id,
            'no_basta' => $request->no_basta,
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->tanggal_basta))
        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Basta Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basta  $basta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        Basta::destroy($id);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data Basta Dengan ID ' . $id . ' Berhasil Dihapus');
    }
}
