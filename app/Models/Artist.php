<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
      'artist_name', 'biography'
    ];

    public function albums(){
      return $this->belongsToMany(Album::class, 'album_artist','artist_id', 'album_id');
    }
}
