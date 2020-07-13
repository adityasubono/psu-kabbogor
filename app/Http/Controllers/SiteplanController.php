<?php

namespace App\Http\Controllers;

use App\Siteplan;
use Illuminate\Http\Request;

class SiteplanController extends Controller
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
            'no_sk_siteplan' => 'required',
            'tanggal_sk_siteplan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        Siteplan::create([
            'perumahan_id' => $request->input('perumahan_id'),
            'no_sk_siteplan' => $request->input('no_sk_siteplan'),
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->get('tanggal_sk_siteplan')))
        ]);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data SK Siteplan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siteplan  $siteplan
     * @return \Illuminate\Http\Response
     */
    public function show(Siteplan $siteplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siteplan  $siteplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteplan $siteplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siteplan  $siteplan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perumahan_id' => 'required',
            'no_sk_siteplan' => 'required',
            'tanggal_sk_siteplan' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');

        Siteplan::where('id',$id)->update([
            'perumahan_id' => $request->perumahan_id,
            'no_sk_siteplan' => $request->no_sk_siteplan,
            'tanggal' => strftime("%d-%m-%Y", strtotime($request->tanggal_sk_siteplan))

        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data SK Siteplan Dengan ID '.$id.' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siteplan  $siteplan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $perumahan_id = $request->get('perumahan_id');
        Siteplan::destroy($id);

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data SK Siteplan Dengan ID ' . $id . ' Berhasil Dihapus');
    }
}
