<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user')->with([
            'users' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $password = $request->get('password');
        $hashed = Hash::make($password);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('user.show')->with([
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('user.edit')->with([
            'user'=>$user
        ]);
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $password = $request->get('password');
        $hashed = Hash::make($password);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users');
    }
}