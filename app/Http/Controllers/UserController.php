<?php

namespace App\Http\Controllers;

use App\Rules;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('PSU_User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $rules = Rules::all()->sortBy('id');
        return view('PSU_User.create', compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'nik' => 'required|size:15',
//            'nama' => 'required',
//            'email' => 'required|min:4|email|unique:users',
//            'file_foto' => 'required',
//            'password' => 'required',
//            'confirmation' => 'required|same:password',
//            'operator' => 'required|not_in:0'
//        ]);

        $image = $request->file('file_foto');
        $ext = $image->getClientOriginalExtension();
        $nama_file = $image->getClientOriginalName();
        $nama_file_saja = pathinfo($nama_file, PATHINFO_FILENAME);
        $newName = $nama_file_saja . rand(100000, 1001238912) . "." . $ext;
        // Define upload path
        $destinationPath = public_path('/assets/uploads/user/'); // upload path
        $image->move($destinationPath, $newName);

        // Save In Database
        $data_user_login = new User();
        $data_user_login->role_id = $request->input('operator');
        $data_user_login->nik = $request->input('nik');
        $data_user_login->nama = $request->input('nama');
        $data_user_login->email = $request->input('email');
        $data_user_login->password = Hash::make($request->input('password'));
        $data_user_login->foto = "$newName";
        $data_user_login->save();
        return redirect('/users')->with('status', 'Data Berhasil Disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        //return view('PSU_User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data_rules = Rules::where('id', $user->role_id)->first();
        $rules = Rules::all()->sortBy('id');
        return view('PSU_User.edit', compact('user', 'rules', 'data_rules'));
    }

    public function editpassword(Request $request)
    {
//        $messages = [
//            'password' => 'Invalid current password.',
//        ];
//
//        $validator = Validator::make(request()->all(), [
//            ''      => 'required|password',
//            'password'              => 'required|min:6|confirmed',
//            'password_confirmation' => 'required',
//
//        ], $messages);
//
//        if ($validator->fails()) {
//            return redirect()
//                ->back()
//                ->withErrors($validator->errors());
//        }

        $password_lama = $request->input('password_lama');
        $password_baru = $request->input('password_baru');
        $password_confirm = $request->input('password_confirm');
        $nik = $request->input('nik');
        $data_user_password = User::where('nik', $nik)->first();

        if ($password_baru === $password_confirm) {

            if (Hash::check($password_lama, $data_user_password->password)) {
                User::where('nik', $data_user_password->nik)->update([
                    'password' => bcrypt($password_baru)
                ]);
                return redirect('/users/edit/' . $data_user_password->id)->with('status', 'Password Berhasil Diganti');
            } else {
                return redirect('/users/edit/' . $data_user_password->id)->with('error', 'Password Yang Anda Masukan Salah');
            }
        } else {
            return redirect('/users/edit/' . $data_user_password->id)->with('error', 'Password Baru Yang Anda Masukan Tidak Sama');
        }

    }

    public function editadmin($id){

        $user = User::find($id);
        $data_rules = Rules::find($user->role_id);
        $rules = Rules::all()->sortBy('id');
        return view('PSU_User.edit_admin', compact('user', 'data_rules','rules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required'
        ]);

        $data = User::find($id);
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        if (empty($request->file('file_foto'))) {
            $data->foto = $data->foto;
        } else {
            $path = public_path('assets/uploads/user/') . $data->foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $nama_file = $file->getClientOriginalName();
            $nama_file_saja = pathinfo($nama_file, PATHINFO_FILENAME);
            $newName = $nama_file_saja . rand(100000, 1001238912) . "." . $ext;
            $file->move('assets/uploads/user/', $newName);
            $data->foto = $newName;
        }


        return redirect('/users/edit/' . $id)->with('status', 'Data Berhasil Diupdate');
    }

    public function updateadmin(Request $request, $id) {

//        $request->validate([
//            'nama' => 'required',
//            'email' => 'required'
//        ]);

        $data = User::find($id);
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        if (empty($request->file('file_foto'))) {
            $data->foto = $data->foto;
        } else {
            $path = public_path('assets/uploads/user/') . $data->foto;
            if (file_exists($path)) {
                unlink($path);
            }
//            unlink('/assets/uploads/permukiman'.$data->file_foto); //menghapus file lama
            $file = $request->file('file_foto');
            $ext = $file->getClientOriginalExtension();
            $nama_file = $file->getClientOriginalName();
            $nama_file_saja = pathinfo($nama_file, PATHINFO_FILENAME);
            $newName = $nama_file_saja . rand(100000, 1001238912) . "." . $ext;
            $file->move('assets/uploads/user/', $newName);
            $data->foto = $newName;
        }

        return redirect('/users')->with('status', 'Data Berhasil Diupdate');
    }

    public function adminpassword(Request $request){
        $password_lama = $request->input('password_lama');
        $password_baru = $request->input('password_baru');
        $password_confirm = $request->input('password_confirm');
        $nik = $request->input('nik');
        $data_user_password = User::where('nik', $nik)->first();

        if ($password_baru === $password_confirm) {

            if (Hash::check($password_lama, $data_user_password->password)) {
                User::where('nik', $data_user_password->nik)->update([
                    'password' => bcrypt($password_baru)
                ]);
                return redirect('/users/editadmin/' . $data_user_password->id)->with('status', 'Password Berhasil Diganti');
            } else {
                return redirect('/users/editadmin/' . $data_user_password->id)->with('error', 'Password Yang Anda Masukan Salah');
            }
        } else {
            return redirect('/users/editadmin/' . $data_user_password->id)->with('error', 'Password Baru Yang Anda Masukan Tidak Sama ');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('status', 'Data Success Delete');
    }
}
