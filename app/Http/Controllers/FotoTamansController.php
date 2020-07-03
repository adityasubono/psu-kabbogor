<?php

namespace App\Http\Controllers;

use App\FotoTaman;
use App\Taman;
use Illuminate\Http\Request;

class FotoTamansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_taman = Taman::find($id);
        $data_foto_taman= FotoTaman::where('taman_id',$id)->get();
        return view('PSU_Perumahan.taman.foto.foto_taman',
            compact('data_taman','data_foto_taman'));
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
        $taman_id= $request->input('taman_id');
        $perumahan_id= $request->input('perumahan_id');
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        $nama_file_saja= pathinfo($profileImage, PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/perumahan/taman/'); // upload path
        $image->move($destinationPath,$newName);

        // Save In Database
        $imagemodel= new FotoTaman();
        $imagemodel->taman_id="$taman_id";
        $imagemodel->perumahan_id="$perumahan_id";
        $imagemodel->nama_foto="$nama_file_saja";
        $imagemodel->file_foto="$newName";
        $imagemodel->save();
        return response()->json(['success'=>$profileImage]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FotoTaman  $fotoTaman
     * @return \Illuminate\Http\Response
     */
    public function show(FotoTaman $fotoTaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FotoTaman  $fotoTaman
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FotoTaman $fotoTaman)
    {
        //
        return view('PSU_Perumahan.taman.foto.edit',compact('fotoTaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FotoTaman  $fotoTaman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $data = FotoTaman::find($id);
        $keterangan = $request->input('keterangan');
        $perumahan_id = $request->get('perumahan_id');

        if (isset($keterangan)){
            $data->keterangan = $keterangan;
        }

        if (empty($request->file('file_foto') && $request->input('keterangan'))){
            $data->file_foto = $data->file_foto;
            $data->keterangan = $data->keterangan;
        }
        else{
            $path = public_path('/assets/uploads/perumahan/taman/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('assets/uploads/perumahan/taman/',$newName);
            $data->file_foto = $newName;
        }
        $data->save();

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Foto Taman dan Penghijauan Berhasil Diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FotoTaman  $fotoTaman
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, FotoTaman $fotoTaman)
    {
        //
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $perumahan_id = $request->get('perumahan_id');

        if (isset($foto_id) && ($filename)) {
            FotoTaman::where('id', $foto_id)->delete();
            $path = public_path('/assets/uploads/perumahan/taman/') . $filename;
            if (file_exists($path)) {
                unlink($path);
            }

            return redirect()->action(
                'PerumahansController@edit', ['id' => $perumahan_id])
                ->with('status', 'Data Foto Taman dan Penghijauan Berhasil Dihapus');
        }
    }
}
