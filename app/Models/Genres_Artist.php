<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres_Artist extends Model
{
    use HasFactory;

    protected $fillable = [
      'genre_name','artist_name'
    ];
}
