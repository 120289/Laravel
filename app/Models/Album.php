<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
      'album_name', 'date'
    ];

    public function artists(){
      return $this->belongsToMany(Artist::class, 'album_artist', 'album_id', 'artist_id');
    }
    public function album_photos(){
      return $this->hasMany(Album_Photos::class);
    }
  }
