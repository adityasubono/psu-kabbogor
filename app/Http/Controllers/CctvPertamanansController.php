<?php

namespace App\Http\Controllers;

use App\CCTVPertamanan;
use App\Pertamanan;
use Illuminate\Http\Request;

class CctvPertamanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_cctv_pertamanan = CCTVPertamanan::where('pertamanan_id',$id)->get();

        return view('PSU_Pertamanan.cctv.cctv', compact('data_cctv_pertamanan','data_pertamanan'));
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
        //
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
            CCTVPertamanan::create($value);
        }

        $pertamanan_id = $request->data_cctv[0]['pertamanan_id'];
        return redirect()->action(
            'CctvPertamanansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CCTVPertamanan  $cctvPertamanan
     * @return \Illuminate\Http\Response
     */
    public function show(CCTVPertamanan $cctvPertamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CCTVPertamanan  $cctvPertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CCTVPertamanan $cctvPertamanan)
    {
        //
        return view('PSU_Pertamanan.cctv.edit', compact('cctvPertamanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CCTVPertamanan  $cctvPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CCTVPertamanan $cctvPertamanan)
    {

        $rules = [
            'nama_cctv' => 'required',
            'ip_cctv' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $pertamanan_id = $request->get('pertamanan_id');
        CCTVPertamanan::where('id', $cctvPertamanan->id)->update([
            'nama_cctv' => $request->nama_cctv,
            'ip_cctv' => $request->ip_cctv
        ]);
        return redirect()->action('CctvPertamanansController@index', ['id' => $pertamanan_id])
            ->with('status','Data Dengan ID '.$cctvPertamanan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CCTVPertamanan  $cctvPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, CCTVPertamanan $cctvPertamanan)
    {
        $permukiman_id = $request->get('pertamanan_id');
        CCTVPertamanan::destroy($cctvPertamanan->id);
        return redirect()->action(
            'CctvPertamanansController@index', ['id' => $permukiman_id])
            ->with('status','Data Berhasil Dihapus Dengan ID : '.$cctvPertamanan->id);
    }
}
