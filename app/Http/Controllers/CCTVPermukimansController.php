<?php

namespace App\Http\Controllers;

use App\CCTVPermukiman;
use App\Permukiman;
use Illuminate\Http\Request;

class CCTVPermukimansController extends Controller
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
        $data_cctv_tpu = CCTVPermukiman::where('permukiman_id',$id)->get();

        return view('PSU_Permukiman.cctvtpu.cctvtpu', compact('data_cctv_tpu','data_permukiman'));
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
            'data_cctv.*.nama_cctv' => 'required',
            'data_cctv.*.ip_cctv' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_cctv.*.nama_cctv.required' => "Masukan Nama CCTV ?",
            'data_cctv.*.ip_cctv.required' => "Masukan IP Camera ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_cctv as $key => $value){
            CCTVPermukiman::create($value);
        }

        $permukiman_id = $request->data_cctv[0]['permukiman_id'];
        return redirect()->action(
            'CCTVPermukimansController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CCTVPermukiman  $cCTVPermukiman
     * @return \Illuminate\Http\Response
     */
    public function show(CCTVPermukiman $cCTVPermukiman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CCTVPermukiman  $cCTVPermukiman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CCTVPermukiman $cCTVPermukiman)
    {
        return view('PSU_Permukiman.cctvtpu.edit', compact('cCTVPermukiman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CCTVPermukiman  $cCTVPermukiman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CCTVPermukiman $cCTVPermukiman)
    {

        $rules = [
            'nama_cctv' => 'required',
            'ip_cctv' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $permukiman_id = $request->get('permukiman_id');
        CCTVPermukiman::where('id', $cCTVPermukiman->id)->update([
            'nama_cctv' => $request->nama_cctv,
            'ip_cctv' => $request->ip_cctv
        ]);
        return redirect()->action('CCTVPermukimansController@index', ['id' => $permukiman_id])
            ->with('status','Data Dengan ID '.$cCTVPermukiman->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CCTVPermukiman  $cCTVPermukiman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, CCTVPermukiman $cCTVPermukiman)
    {
        $permukiman_id = $request->get('permukiman_id');
        CCTVPermukiman::destroy($cCTVPermukiman->id);
        return redirect()->action(
            'CCTVPermukimansController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$cCTVPermukiman->id);
    }
}
