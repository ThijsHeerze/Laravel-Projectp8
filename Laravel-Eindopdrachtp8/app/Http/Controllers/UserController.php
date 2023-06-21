<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //deze functie haalt gegevens op over de huidige gebruiker, de vrienden van de gebruiker en alle andere gebruikers om weer te geven op de user.index.
    public function index()
    {
        //Auth::id methode opgehaald
        $userId = Auth::id();

        $showFriends = Friendship::where('user_id', $userId)
            ->join('users', 'friendship.friend_id', '=', 'users.id')
            ->select('friendship.*', 'users.name')
            ->get();

        $addFriend = User::where('id', '!=', $userId)->get();
        $users = User::all();
        return view('user.index', compact('users','addFriend', 'showFriends'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //deze functie ontvangt een verzoek om een friendship toe te voegen, haalt de huidige gebruikersidentificatie op, 
    //creëert een nieuw "Friendship" object met de juiste gegevens en slaat het op in de database. 
    //Daarna wordt de gebruiker doorgestuurd naar de user.index met en zegt 'Friend added successfully.'
    public function store(Request $request)
    {
        
        $user = Auth::id();
        //nieuw opject van Friendship model gemaakt
        $addFriend = new Friendship();
        $addFriend->user_id = $user;
        $addFriend->friend_id = $request->input('friend_id');
        $addFriend->save();
        return redirect()->route('user.index')->with('status', 'Friend added successfully.');
    }
}
