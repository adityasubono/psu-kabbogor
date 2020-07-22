<?php

namespace App\Http\Controllers;

use App\CCTVPerumahan;
use App\Perumahans;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CCTVPerumahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_perumahan = Perumahans::find($id);
        $data_cctv_perumahan = CCTVPerumahan::where('perumahan_id',$id)->get();

        return view('PSU_Perumahan.cctv.index', compact('data_cctv_perumahan','data_perumahan'));
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
            CCTVPerumahan::create($value);

        }
        $perumahan_id = $request->data_cctv[0]['perumahan_id'];
        $data_cctv = CCTVPerumahan::where('perumahan_id',$perumahan_id)->get();


        foreach ($data_cctv as $cctv){
            $newName = rand(100000, 1001238912).".m3u8";
            $cctv->title = $newName;
            $id_folder = $request->data_cctv[0]['perumahan_id'];

          Storage::disk('video_cctv_perumahan')->put('/'.$id_folder.'/'.'/'.$cctv->id.'/'.$newName, '
            VIDSOURCE="rtsp://{username}:{password}@{ip_address}:554/cam/realmonitor?channel=1&subtype=0"
            AUDIO_OPTS="-c:a aac -b:a 160000 -ac 2"
            VIDEO_OPTS="-s 854x480 -c:v libx264 -b:v 800000"
            OUTPUT_HLS="-hls_time 10 -hls_list_size 10 -start_number 1"
            ffmpeg -i "$VIDSOURCE" -y $AUDIO_OPTS $VIDEO_OPTS $OUTPUT_HLS mystream.m3u8');
            $cctv->save();
        }

        return redirect()->action(
            'PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data CCTV Perumahan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CCTVPerumahan  $cCTVPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(CCTVPerumahan $cCTVPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CCTVPerumahan  $cCTVPerumahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CCTVPerumahan $cCTVPerumahan)
    {
        return view('PSU_Perumahan.cctv.edit', compact('cCTVPerumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CCTVPerumahan  $cCTVPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CCTVPerumahan $cCTVPerumahan)
    {
        $rules = [
            'nama_cctv' => 'required',
            'ip_cctv' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        CCTVPerumahan::where('id', $cCTVPerumahan->id)->update([
            'nama_cctv' => $request->nama_cctv,
            'ip_cctv' => $request->ip_cctv
        ]);
        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data CCTV Perumahan Dengan ID '.$cCTVPerumahan->id.' Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CCTVPerumahan  $cCTVPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, CCTVPerumahan $cCTVPerumahan)
    {
        $perumahan_id = $request->get('perumahan_id');
        CCTVPerumahan::destroy($cCTVPerumahan->id);
        return redirect()->action(
            'PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data CCTV Perumahan Berhasil Dihapus Dengan ID : '.$cCTVPerumahan->id);
    }
}
