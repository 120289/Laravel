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

    public static function contactSearch($name) {
    return Contact::where('album_name', 'LIKE', "%$name%")
    ->orWhere('date', 'LIKE', "%$name%")->get();
  }
}
