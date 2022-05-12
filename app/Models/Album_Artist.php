<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_Artist extends Model
{
    use HasFactory;
    protected $table = 'album_artist';
    public $timestamps = false;

    protected $fillable = [
      'artist_id','album_id'
    ];
}
