<?php

namespace App\Http\Controllers;

use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\VideoCctvPerumahan;
use Illuminate\Http\Request;

class VideoCctvPerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $video = VideoCctvPerumahan::create([
            'disk'          => 'videos_disk',
            'original_name' => $request->video->getClientOriginalName(),
            'path'          => $request->video->store('videos', 'videos_disk'),
            'title'         => $request->title,
        ]);

        $this->dispatch(new ConvertVideoForDownloading($video));
        $this->dispatch(new ConvertVideoForStreaming($video));

        return response()->json([
            'id' => $video->id,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoCctvPerumahan  $videoCctvPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCctvPerumahan $videoCctvPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoCctvPerumahan  $videoCctvPerumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoCctvPerumahan $videoCctvPerumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoCctvPerumahan  $videoCctvPerumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoCctvPerumahan $videoCctvPerumahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoCctvPerumahan  $videoCctvPerumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCctvPerumahan $videoCctvPerumahan)
    {
        //
    }
}
