<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_Photos extends Model
{
    use HasFactory;
    protected $table = 'album_photos';
    protected $fillable = [
      'photo_name','album_id'
    ];
}
