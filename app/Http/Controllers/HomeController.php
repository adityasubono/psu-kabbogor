<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {

    }


    public function login(Request $request)
    {
        $nik = $request->input('nik');
        $password = $request->input('password');
        $operator = $request->input('operator');

        $data = User::where('nik', $nik)
                ->where('password', $password)->first();

        if($data){
//                Session::('nama', $data->name);
//                Session::put('nik', $data->nik);
//                Session::put('operator', $data->operator);
//                Session::put('login', TRUE);
//            $validationCode = Request::session()->get('login');
                return redirect('/beranda');
        }else {
            return redirect('/')->with('alert', 'Nik dan Password Salah');

//        if ($data) {
//            if (Hash::check($password, $data->password)) {
//                Session::put('name', $data->nama);
//                Session::put('nik', $data->nik);
//                Session::put('operator', $data->operator);
//                Session::put('login', TRUE);
//                return redirect('/beranda');
//            } else {
//                return redirect('/')->with('alert', 'Nik'. $nik .'Password'.$password.' dan
//                Pilih Operator'.$operator.'Salah!');
//            }
//        } else {
//            return redirect('/')->with('alert', 'Nik'. $nik .'Password'.$password.' dan
//                Pilih Operator'.$operator.'Salah!');
        }
    }

    public function logout()
    {
//        Session::flush();
        return redirect('/')->with('alert', 'Kamu sudah logout');
    }
}
