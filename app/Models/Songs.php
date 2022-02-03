<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    protected $fillable = [
      'Songs_title', 'Songs_txt', 'Album_name', 'Album_Photos', 'artist_name', 'date'
    ];
}
