<?php

namespace App\Http\Controllers;

use App\FotoPerumahan;
use Illuminate\Http\Request;

class FotoPerumahansController extends Controller
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
        $this->validate($request, [
            // check validtion for image or file
            'file_foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $perumahan_id = $request->get('perumahan_id');
        if($files=$request->file('file_foto')) {
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                $newName = rand(100000, 1001238912) . "." . $ext;
                $destinationPath = public_path('/assets/uploads/perumahan/perumahan'); // upload path
                $file->move($destinationPath, $newName);

                FotoPerumahan::create([
                    'file_foto' => $newName,
                    'perumahan_id' => $perumahan_id,
                    //you can put other insertion here
                ]);
            }
            return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
                ->with('status', 'Data Foto Siteplan Berhasil Disimpan');
        }

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('error', 'Data Perumahan Gagal Disimpan Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FotoPerumahan  $fotoPerumahan
     * @return \Illuminate\Http\Response
     */
    public function show(FotoPerumahan $fotoPerumahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FotoPerumahan  $fotoPerumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoPerumahan $fotoPerumahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FotoPerumahan  $fotoPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = FotoPerumahan::find($id);
        $keterangan = $request->input('keterangan');
        $perumahan_id = $request->get('perumahan_id');

        if (isset($keterangan)){
            $data->keterangan = $keterangan;
        }

        if (empty($request->file('file_foto'))) {
            $data->file_foto = $data->file_foto;
            $data->keterangan = $data->keterangan;
        } else{
            $path = public_path('/assets/uploads/perumahan/perumahan/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('assets/uploads/perumahan/perumahan/',$newName);
            $data->file_foto = $newName;
//            $data->keterangan = $request->input('keterangan');
        }
        $data->save();

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Foto/Gambar Siteplan Berhasil Diupdate ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FotoPerumahan  $fotoPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $perumahan_id = $request->get('perumahan_id');

        if (isset($foto_id) && ($filename)) {
            FotoPerumahan::where('id', $foto_id)->delete();
            $path = public_path('/assets/uploads/perumahan/perumahan/') . $filename;
            if (file_exists($path)) {
                unlink($path);
            }

            return redirect()->action(
                'PerumahansController@edit', ['id' => $perumahan_id])
                ->with('status','Data Foto/Gambar Siteplan Perumahan Berhasil Dihapus ');
        } else {
            FotoPerumahan::where('id', $foto_id)->delete();

            return redirect()->action(
                'PerumahansController@edit', ['id' => $perumahan_id])
                ->with('status','Data Foto/Gambar Siteplan Perumahan Berhasil Dihapus ');
        }
    }
}
