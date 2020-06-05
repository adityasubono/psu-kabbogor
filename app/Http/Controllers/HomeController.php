<?php

namespace App\Http\Controllers;

use App\Rules;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $data = User::where('nik', $nik)->first();
        if ($data) {
            $rule = Rules::where('id', $data->role_id)->first();
            echo "rule" . $rule;
            if (Hash::check($password, $data->password)) {
                $request->session()->put('nama', $data->nama);
                $request->session()->put('nik', $data->nik);
                $request->session()->put('nama_rule', $rule->nama_rule);
                $request->session()->put('foto', $data->foto);
                $request->session()->put('login', TRUE);

                return redirect('/beranda');
            } else {
                return redirect('/')->with('alert', 'Nik dan Password Salah');
            }
        } else {
            return redirect('/')->with('alert', 'Nik dan Password Salah');
        }
    }

    public
    function logout(Request $request)
    {

        $login = $request->input('login');
        if (isset($login) == '1') {
            $request->session()->forget('nama');
            $request->session()->forget('nik');
            $request->session()->forget('operator');
            $request->session()->forget('login');
            $request->session()->forget('foto');
            return redirect('/')->with('alert-success', 'Sampai Jumpa Kembali ');
        } else {
            return abort(403);
        }
    }
}
