<?php

namespace App\Http\Controllers;

use App\Koordinattpu;
use App\Permukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class KoordinattpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //
        $data_permukiman = Permukiman::find($id);
        $data_koordinattpu = Koordinattpu::where('permukiman_id',$id)->get();

        return view('PSU_Permukiman.koordinattpu.koordinattpu', compact('data_koordinattpu',
            'data_permukiman'));
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
            Koordinattpu::create($value);
        }

        $permukiman_id = $request->data_koordinat[0]['permukiman_id'];

        return redirect()->action('KoordinattpusController@index', ['id' => $permukiman_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Koordinattpu  $koordinattpu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $koordinattpu = Koordinattpu::where('id',$id)->get();
        return view('PSU_Permukiman.koordinattpu.peta', compact('koordinattpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Koordinattpu  $koordinattpu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Koordinattpu $koordinattpu)
    {
        return view('PSU_Permukiman.koordinattpu.edit', compact('koordinattpu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Koordinattpu  $koordinattpu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Koordinattpu $koordinattpu)
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

        $permukiman_id = $request->get('permukiman_id');
        Koordinattpu::where('id', $koordinattpu->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude
        ]);
        return redirect()->action('KoordinattpusController@index', ['id' => $permukiman_id])
            ->with('status','Data Dengan ID '.$koordinattpu->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Koordinattpu  $koordinattpu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Koordinattpu $koordinattpu)
    {
        $permukiman_id = $request->get('permukiman_id');
        Koordinattpu::destroy($koordinattpu->id);
        return redirect()->action(
            'KoordinattpusController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$koordinattpu->id);
    }
}
