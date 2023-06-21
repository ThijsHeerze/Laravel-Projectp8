<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $table = 'friendship';

    protected $fillable = [
        'user_id',
        'friend_id',
    ];

    //function die een belongsTo relationship returned 
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
