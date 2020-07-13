<?php

namespace App\Http\Controllers;

use App\Bast;
use Illuminate\Http\Request;

class BastController extends Controller
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
            'no_bast' => 'required',
            'tanggal_bast' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Bast::create([
            'perumahan_id' => $request->input('perumahan_id'),
            'no_bast' => $request->input('no_bast'),
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->get('tanggal_bast')))
        ]);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data BAST Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bast  $bast
     * @return \Illuminate\Http\Response
     */
    public function show(Bast $bast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bast  $bast
     * @return \Illuminate\Http\Response
     */
    public function edit(Bast $bast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bast  $bast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perumahan_id' => 'required',
            'no_bast' => 'required',
            'tanggal_bast' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');

        Bast::where('id',$id)->update([
            'perumahan_id' => $request->perumahan_id,
            'no_bast' => $request->no_bast,
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->tanggal_bast))
        ]);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data BAST Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bast  $bast
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        Bast::destroy($id);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data BAST Dengan ID ' . $id . ' Berhasil Dihapus');
    }
}
