<?php

namespace App\Http\Controllers;

use App\KoordinatSarana;
use Illuminate\Http\Request;

class KoordinatSaranasController extends Controller
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
        KoordinatSarana::create($request->all());
        return redirect('/perumahans')->with('status','Data Success Insert');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\Response
     */
    public function show(KoordinatSarana $koordinatSarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\Response
     */
    public function edit(KoordinatSarana $koordinatSarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KoordinatSarana $koordinatSarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatSarana  $koordinatSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(KoordinatSarana $koordinatsarana)
    {
        KoordinatSarana::destroy($koordinatsarana->id);
        return redirect('/perumahans')->with('status','Data Success Delete');
    }
}
