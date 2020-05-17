<?php

namespace App\Http\Controllers;

use App\FotoPertamanan;
use App\Fototpu;
use App\Pertamanan;
use Illuminate\Http\Request;

class FotoPertamanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_pertamanan = Pertamanan::find($id);
        $data_foto_pertamanan = FotoPertamanan::where('pertamanan_id', $id)->get();

        return view('PSU_Pertamanan.foto.foto', compact('data_foto_pertamanan', 'data_pertamanan'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $pertamanan_id = $request->input('pertamanan_id');
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        $nama_file_saja = pathinfo($profileImage, PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000, 1001238912) . "." . $ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/pertamanan/'); // upload path
        $image->move($destinationPath, $newName);

        // Save In Database
        $imagemodel = new FotoPertamanan();
        $imagemodel->pertamanan_id = "$pertamanan_id";
        $imagemodel->nama_foto = "$nama_file_saja";
        $imagemodel->file_foto = "$newName";
        $imagemodel->save();
        return response()->json(['success' => $profileImage]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\FotoPertamanan $fotoPertamanan
     * @return \Illuminate\Http\Response
     */
    public function show(FotoPertamanan $fotoPertamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\FotoPertamanan $fotoPertamanan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FotoPertamanan $fotoPertamanan, $id)
    {
        //
        $data_foto = FotoPertamanan::findOrFail($id);
        return view('PSU_Permukiman.fototpu.edit', compact('data_foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\FotoPertamanan $fotoPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, FotoPertamanan $fotoPertamanan, $id)
    {
        $data = FotoPertamanan::find($id);
        $data->nama_foto = $request->input('nama_foto');
//        $data->file_foto = $request->file('file_foto');
        $pertamanan_id = $request->get('pertamanan_id');

        if (empty($request->file('file_foto'))) {
            $data->file_foto = $data->file_foto;
        } else {
            $path = public_path('/assets/uploads/pertamanan/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000, 1001238912) . "." . $ext;
            $file->move('assets/uploads/permukiman', $newName);
            $data->file_foto = $newName;
        }
        $data->save();

        return redirect()->action('FotoPertamanansController@index', ['id' => $pertamanan_id])
            ->with('status', 'Data Foto Berhasil Diupdate ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\FotoPertamanan $fotoPertamanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, FotoPertamanan $fotoPertamanan)
    {
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $pertamanan_id = $request->get('pertamanan_id');

//        if (isset($foto_id) && ($filename)) {
//            FotoPertamanan::where('id', $foto_id)->delete();
//            $path = public_path('/assets/uploads/pertamanan/') . $filename;
//            if (file_exists($path)) {
//                unlink($path);
//            }
//
//            return redirect()->action(
//                'FotoPertamanansController@index', ['id' => $pertamanan_id]);
//        }

        FotoPertamanan::where('nama_foto',$filename)->delete();
        $path=public_path('/assets/uploads/pertamanan/').$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}

