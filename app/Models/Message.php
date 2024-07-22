<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'email',
        'message',
        'readable'
    ];

    // The attributes that should be hidden for arrays.
    protected $hidden = [];

    // The attributes that should be cast to native types.
    protected $casts = [];
}
