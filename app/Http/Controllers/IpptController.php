<?php

namespace App\Http\Controllers;

use App\Ippt;
use Illuminate\Http\Request;

class IpptController extends Controller
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
            'no_ippt' => 'required',
            'tanggal_ippt' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Ippt::create([
            'perumahan_id' => $request->input('perumahan_id'),
            'no_ippt' => $request->input('no_ippt'),
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->get('tanggal_ippt')))
        ]);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data IPPT Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ippt  $ippt
     * @return \Illuminate\Http\Response
     */
    public function show(Ippt $ippt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ippt  $ippt
     * @return \Illuminate\Http\Response
     */
    public function edit(Ippt $ippt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ippt  $ippt
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perumahan_id' => 'required',
            'no_ippt' => 'required',
            'tanggal_ippt' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');

        Ippt::where('id',$id)->update([
            'perumahan_id' => $request->perumahan_id,
            'no_ippt' => $request->no_ippt,
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->tanggal_ippt))
        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data IPPT Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ippt  $ippt
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        Ippt::destroy($id);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data IPPT Dengan ID ' . $id . ' Berhasil Dihapus');
    }
}
