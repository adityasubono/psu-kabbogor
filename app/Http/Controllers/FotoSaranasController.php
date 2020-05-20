<?php

namespace App\Http\Controllers;

use App\FotoSarana;
use App\KoordinatSarana;
use App\Perumahans;
use App\Sarana;
use Illuminate\Http\Request;

class FotoSaranasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_sarana = Sarana::find($id);
        $data_foto_sarana = FotoSarana::where('sarana_id',$id)->get();
        return view('PSU_Perumahan.sarana.foto.foto_sarana',
            compact('data_sarana','data_foto_sarana'));
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
//        $data = new \App\FotoSarana();
//        $data->perumahan_id = $request->input('perumahan_id');
//        $data->sarana_id = $request->input('sarana_id');
//        $data->nama_foto = $request->input('nama_foto');
//        $file_foto = $request->file('file_foto_sarana');
//        $ext = $file_foto->getClientOriginalExtension();
//        $newName = rand(100000,1001238912).".".$ext;
//        $file_foto->move('assets/uploads/file_sarana',$newName);
//        $data->file_foto = $newName;
//        $data->save();
//        return redirect('/perumahans')->with('status','Data Foto Success Insert');

        $sarana_id= $request->input('sarana_id');
        $perumahan_id= $request->input('perumahan_id');
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        $nama_file_saja= pathinfo($profileImage, PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/perumahan/sarana/'); // upload path
        $image->move($destinationPath,$newName);

        // Save In Database
        $imagemodel= new FotoSarana();
        $imagemodel->sarana_id="$sarana_id";
        $imagemodel->perumahan_id="$perumahan_id";
        $imagemodel->nama_foto="$nama_file_saja";
        $imagemodel->file_foto="$newName";
        $imagemodel->save();
        return response()->json(['success'=>$profileImage]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Http\Response
     */
    public function show(FotoSarana $fotoSarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(FotoSarana $fotoSarana)
    {
        return view('PSU_Perumahan.sarana.foto.edit',compact('fotoSarana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\FotoSarana $fotoSarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = FotoSarana::find($id);
        $data->nama_foto = $request->input('nama_foto');
//        $data->file_foto = $request->file('file_foto');
        $sarana_id = $request->get('sarana_id');

        if (empty($request->file('file_foto'))){
            $data->file_foto = $data->file_foto;
        }
        else{
            $path = public_path('/assets/uploads/perumahan/sarana/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('assets/uploads/perumahan/sarana/',$newName);
            $data->file_foto = $newName;
        }
        $data->save();

        return redirect()->action('FotoSaranasController@index', ['id' => $sarana_id])
            ->with('status','Data Foto Berhasil Diupdate ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\FotoSarana $fotosarana
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $sarana_id = $request->get('sarana_id');

        if (isset($foto_id) && ($filename)) {
            FotoSarana::where('id', $foto_id)->delete();
            $path = public_path('/assets/uploads/perumahan/sarana/') . $filename;
            if (file_exists($path)) {
                unlink($path);
            }

            return redirect()->action(
                'FotoSaranasController@index', ['id' => $sarana_id])
                ->with('status','Data Foto Berhasil Diupdate ');
        }
    }
}
