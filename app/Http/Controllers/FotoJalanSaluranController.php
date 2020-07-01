<?php

namespace App\Http\Controllers;

use App\FotoJalanSaluran;
use App\JalanSaluran;
use Illuminate\Http\Request;

class FotoJalanSaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_jalansaluran = JalanSaluran::find($id);
        $data_foto_jalansaluran = FotoJalanSaluran::where('jalansaluran_id',$id)->get();
        return view('PSU_Perumahan.jalansaluran.foto.foto_jalan_saluran',
            compact('data_jalansaluran','data_foto_jalansaluran'));
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
        //
        $jalansaluran_id= $request->input('jalansaluran_id');
        $perumahan_id= $request->input('perumahan_id');
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        $nama_file_saja= pathinfo($profileImage, PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/perumahan/jalansaluran/'); // upload path
        $image->move($destinationPath,$newName);

        // Save In Database
        $imagemodel= new FotoJalanSaluran();
        $imagemodel->jalansaluran_id="$jalansaluran_id";
        $imagemodel->perumahan_id="$perumahan_id";
        $imagemodel->nama_foto="$nama_file_saja";
        $imagemodel->file_foto="$newName";
        $imagemodel->save();

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Foto Jalan Saluran Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(FotoJalanSaluran $fotoJalanSaluran)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FotoJalanSaluran $fotoJalanSaluran)
    {
        return view('PSU_Perumahan.jalansaluran.foto.edit',compact('fotoJalanSaluran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = FotoJalanSaluran::find($id);
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
            $path = public_path('/assets/uploads/perumahan/jalansaluran/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('assets/uploads/perumahan/jalansaluran/',$newName);
            $data->file_foto = $newName;
        }
        $data->save();

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status','Data Foto Jalan Saluran Berhasil Diupdate ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FotoJalanSaluran  $fotoJalanSaluran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $perumahan_id = $request->get('perumahan_id');

        if (isset($foto_id) && ($filename)) {
            FotoJalanSaluran::where('id', $foto_id)->delete();
            $path = public_path('/assets/uploads/perumahan/jalansaluran/') . $filename;
            if (file_exists($path)) {
                unlink($path);
            }

            return redirect()->action(
                'PerumahansController@edit', ['id' => $perumahan_id])
                ->with('status','Data Foto Jalan Saluran Berhasil Dihapus ');
        }
    }
}
