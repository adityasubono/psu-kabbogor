<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        return view('PSU_User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|size:9',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'operator' => 'required|not_in:0'
        ]);

        User::create($request->all());
        return redirect('/users')->with('status','Data Success Insert');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        //return view('PSU_User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('PSU_User.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nik' => 'required|size:9',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'operator' => 'required|not_in:0'
        ]);
        User::where('id', $user->id)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'operator' => $request->operator
            ]);
        return redirect('/users')->with('status','Data Success Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users')->with('status','Data Success Delete');
    }

    public function login()
    {

    }
}
