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

    public static function contactSearch($name) {
    return Contact::where('artist_name', 'LIKE', "%$name%")
    ->orWhere('biography', 'LIKE', "%$name%")->get();
  }
}
