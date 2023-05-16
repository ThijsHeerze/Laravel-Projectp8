<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use Session;

class GameController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        return redirect()->route('index');
    }

    public function show($id)
    {
        return view('show');
    }

    public function edit($id)
    {
        return view('edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        return redirect()->route('index');
    }
}