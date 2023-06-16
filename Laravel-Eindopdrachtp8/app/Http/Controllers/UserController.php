<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //all()?
        $user = User::all();
        return view('user.index')->with([
            'users' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UpdateUserRequest $request)
    {
        $password = $request->get('password');
        $hashed = Hash::make($password);
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show')->with([
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with([
            'user'=>$user
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $password = $request->get('password');
        $hashed = Hash::make($password);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $hashed
        ]);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}