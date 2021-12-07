<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_Photos extends Model
{
    use HasFactory;

    protected $fillable = [
      'album_name', 'date', 'photo_name', 'img_dir'
    ];
}
