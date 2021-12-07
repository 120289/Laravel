<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = [
      'genre_name','origin_country';
    ];

    public static function contactSearch($name) {
    return Contact::where('genre_name', 'LIKE', "%$name%")
    ->orWhere('origin_country', 'LIKE', "%$name%")->get();
  }
}
