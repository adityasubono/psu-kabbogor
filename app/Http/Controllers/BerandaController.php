<?php

namespace App\Http\Controllers;

use App\Permukiman;
use App\Pertamanan;
use App\Perumahans;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function index(Request $request)
    {
        if($request->session()->has('nama') && $request->session()->has('nik') && $request->session
            ()->has('nama_rule') == 'Administrator' && $request->session()->has('login') == 'TRUE'){
//            return redirect('/')->with('alert','nama kamu adalah'.$request->session()->get
//                ('nama').$request->session()->get('operator').$request->session()->get('nik'));

            $jml_assets_perumahan = Perumahans::all()->count();
            $jml_assets_pertamanan = Pertamanan::all()->count();
            $jml_assets_permukiman = Permukiman::all()->count();
            return view('PSU_Beranda.index', compact('jml_assets_perumahan',
                'jml_assets_pertamanan', 'jml_assets_permukiman'));
        }

        elseif ($request->session()->has('nama') && $request->session()->has('nik') &&
            $request->session ()->has('nama_rule') == 'Operator PSU Perumahan' &&
            $request->session()->has('login') == 'TRUE'){
            return redirect('/perumahans');
        }
        elseif ($request->session()->has('nama') && $request->session()->has('nik') &&
            $request->session ()->has('nama_rule') == 'Operator PSU Kawasan Permukiman' &&
            $request->session()->has('login') == 'TRUE'){
            return redirect('/permukimans');
        }
        elseif ($request->session()->has('nama') && $request->session()->has('nik') &&
            $request->session ()->has('nama_rule') == 'Operator PSU Pertamanan' &&
            $request->session()->has('login') == 'TRUE'){
            return redirect('/pertamanans');
        }else{
            return abort(403);
        }

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
