<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist_Album extends Model
{
    use HasFactory;

    protected $fillable = [
      'artist_name', 'album_photo', 'date'
    ];
}
