<?php

namespace App\Http\Controllers;

use App\Rules;
use App\User;
use http\Exception;
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
        $remember_token = $request->input('remember_token');

        $data = User::where('nik', $nik)->first();

        $pdo = DB::connection()->getPdo();
        if($pdo) {


            if ($data) {
                $rule = Rules::where('id', $data->role_id)->first();
                echo "rule" . $rule;

                date_default_timezone_set('Asia/Jakarta');
                $login_date = date('d/m/Y h:i:s a', time());
                $status = 'Aktif';
                User::where('nik', $data->nik)->update([
                    'remember_token' => $remember_token,
                    'login_date' => $login_date,
                    'status' => $status
                ]);

                if (Hash::check($password, $data->password)) {
                    $request->session()->put('id', $data->id);
                    $request->session()->put('nama', $data->nama);
                    $request->session()->put('nik', $data->nik);
                    $request->session()->put('nama_rule', $rule->nama_rule);
                    $request->session()->put('foto', $data->foto);
                    $request->session()->put('login_date', $login_date);
                    $request->session()->put('logout_date', $data->logout_date);
                    $request->session()->put('remember_token', $remember_token);
                    $request->session()->put('login', TRUE);

                    return redirect('/beranda');
                } else {
                    return redirect('/')->with('alert', 'NIK dan Password Salah');
                }
            } else {
                return redirect('/')->with('alert', 'NIK dan Password Salah');
            }
        }else{
            return redirect('/')->with('alert', 'Koneksi Terputus');
        }


    }

    public function logout(Request $request)
    {

        $login = $request->input('login');
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        date_default_timezone_set('Asia/Jakarta');
        $status = "Non Aktif";
        $logout_date = date('d/m/Y h:i:s a', time());
        if (isset($login) == '1') {
            $request->session()->forget('id');
            $request->session()->forget('nama');
            $request->session()->forget('nik');
            $request->session()->forget('operator');
            $request->session()->forget('login');
            $request->session()->forget('foto');
            $request->session()->forget('login_date');
            $request->session()->forget('logout_date');

            User::where('nik', $nik)->update([
                'logout_date' => $logout_date,
                'status' => $status,
            ]);

            return redirect('/')->with('alert-success', 'Anda Telah Keluar Pada Tanggal '
                . $logout_date . ' Sampai Jumpa Kembali ' . $nama);
        } else {
            return abort(403);
        }
    }
}
