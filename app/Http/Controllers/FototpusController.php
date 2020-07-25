<?php

namespace App\Http\Controllers;

use App\Fototpu;
use App\Permukiman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class FototpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        //
        $data_permukiman = Permukiman::find($id);
        $data_foto_tpu = Fototpu::where('permukiman_id', $id)->get();

        return view('PSU_Permukiman.fototpu.foto_tpu', compact('data_foto_tpu', 'data_permukiman'));
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
        $permukiman_id = $request->input('permukiman_id');
        $image = $request->file('file');
        $profileImage = $image->getClientOriginalName();
        $nama_file_saja= pathinfo($profileImage, PATHINFO_FILENAME);
        $ext = $image->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/permukiman/'); // upload path
        $image->move($destinationPath,$newName);

        // Save In Database
        $imagemodel= new Fototpu();
        $imagemodel->permukiman_id="$permukiman_id";
        $imagemodel->nama_foto="$nama_file_saja";
        $imagemodel->file_foto="$newName";
        $imagemodel->save();
        return response()->json(['success'=>$profileImage]);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Fototpu $fototpu
     * @return \Illuminate\Http\Response
     */
    public function show(Fototpu $fototpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Fototpu $fototpu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $data_foto = Fototpu::findOrFail($id);
        return view('PSU_Permukiman.fototpu.edit',compact('data_foto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Fototpu $fototpu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = Fototpu::find($id);
        $data->nama_foto = $request->input('nama_foto');
//        $data->file_foto = $request->file('file_foto');
        $permukiman_id = $request->get('permukiman_id');

        if (empty($request->file('file_foto'))){
            $data->file_foto = $data->file_foto;
        }
        else{
            $path = public_path('/assets/uploads/permukiman/') . $data->file_foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('assets/uploads/permukiman',$newName);
            $data->file_foto = $newName;
        }
        $data->save();

        return redirect()->action('FototpusController@index', ['id' => $permukiman_id])
            ->with('status','Data Foto Berhasil Diupdate ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Fototpu $fototpu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $foto_id = $request->get('id');
        $filename = $request->get('filename');
        $permukiman_id = $request->get('permukiman_id');

        if (isset($foto_id) && ($filename)) {
            Fototpu::where('id', $foto_id)->delete();
            $path = public_path('/assets/uploads/permukiman/') . $filename;
            if (file_exists($path)) {
                unlink($path);
            }

            return redirect()->action(
                'FototpusController@index', ['id' => $permukiman_id]);
        }
    }

}
