<?php

namespace App\Http\Controllers;

use App\Inventaris;
use App\Permukiman;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_permukiman = Permukiman::find($id);
        $data_inventaris = Inventaris::where('permukiman_id',$id)->get();

        return view('PSU_Permukiman.inventaris.inventaris', compact('data_inventaris','data_permukiman'));
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
            'data_inventaris.*.nama_alat' => 'required',
            'data_inventaris.*.jumlah' => 'required',
            'data_inventaris.*.keterangan' => 'required',

        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_inventaris.*.nama_alat.required' => "Masukan Data Nama Alat ?",
            'data_inventaris.*.jumlah.required' => "Masukan Data Jumlah ?",
            'data_inventaris.*.keterangan.required' => "Masukan Data Keterangan ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_inventaris as $key => $value){
            Inventaris::create($value);
        }

        $permukiman_id = $request->data_inventaris[0]['permukiman_id'];

        return redirect()->action('InventarisController@index', ['id' => $permukiman_id])
            ->with('status','Data Inventaris Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Inventaris $inventaris)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Inventaris $inventaris)
    {
        return view('PSU_Permukiman.inventaris.edit', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Inventaris $inventaris)
    {

        $rules = [
            'nama_alat' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $permukiman_id = $request->get('permukiman_id');
        Inventaris::where('id', $inventaris->id)->update([
            'nama_alat' => $request->nama_alat,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->action('InventarisController@index', ['id' => $permukiman_id])
            ->with('status','Data Dengan ID '.$inventaris->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Inventaris $inventaris)
    {
        $permukiman_id = $request->get('permukiman_id');
        Inventaris::destroy($inventaris->id);
        return redirect()->action(
            'InventarisController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$inventaris->id);
    }
}
