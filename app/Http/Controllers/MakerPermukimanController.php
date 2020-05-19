<?php

namespace App\Http\Controllers;

use App\Koordinattpu;
use App\MakerPermukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MakerPermukimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $locations =  DB::table('koordinattpus')->get();
        return view('PSU_Kegiatan_Fisik.index',compact('locations'));
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
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function show(MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function edit(MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MakerPermukiman $makerPermukiman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MakerPermukiman  $makerPermukiman
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakerPermukiman $makerPermukiman)
    {
        //
    }
}
