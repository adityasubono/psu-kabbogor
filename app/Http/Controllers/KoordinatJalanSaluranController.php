<?php

namespace App\Http\Controllers;

use App\KoordinatJalanSaluran;
use Illuminate\Http\Request;

class KoordinatJalanSaluranController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //
        KoordinatJalanSaluran::create($request->all());
        return redirect('/perumahans')->with('status','Data Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function show(KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function edit(KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatJalanSaluran  $koordinatJalanSaluran
     * @return \Illuminate\Http\Response
     */
    public function destroy(KoordinatJalanSaluran $koordinatJalanSaluran)
    {
        //
    }
}
