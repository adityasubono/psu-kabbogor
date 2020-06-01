<?php

namespace App\Http\Controllers;

use App\Rules;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $data = User::where('nik', $nik)
                ->where('password', $password)->first();
//        $role_user = Roles::where('role_id', $data->id_role)->first();

        if($data){
            $request->session()->put('nama',$data->nama);
            $request->session()->put('nik',$data->nik);
            $request->session()->put('role_id',$data->role_id);
            $request->session()->put('foto',$data->foto);
            $request->session()->put('login',TRUE);
//                Session::put('nik', $data->nik);
//                Session::put('operator', $data->operator);
//                Session::put('login', TRUE);
                return redirect('/beranda');
        }else {
            return redirect('/')->with('alert', 'Nik dan Password Salah');
        }
    }

    public function logout(Request $request, $nama)
    {
    	$request->session()->forget('nama');
        $request->session()->forget('nik');
        $request->session()->forget('operator');

        return redirect('/')->with('alert-success', 'Sampai Jumpa Kembali '.$nama );
    }
}
