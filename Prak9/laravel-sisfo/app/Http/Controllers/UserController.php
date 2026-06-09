<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function __construct() {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->level !== 'ADMIN') {
            abort(403);
        }
        return $next($request);
    });
}

    public function index()
    {
        $users = \App\Models\User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'level' => 'required',
        ]);    

        $user = new \App\Models\User;
        $user->name = $request->get('nama');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = \Hash::make($request->get('password'));
        $user->level = $request->get('level');

        $user->save();

        return redirect()->route('users.index')->with('status', 'User baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = \App\Models\User::findOrFail($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required',
        ]);

        $user->name = $request->get('nama');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->level = $request->get('level');

        $user->save();

        return redirect()->route('users.index')->with('status', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User berhasil dihapus');
    }
}
