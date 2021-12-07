<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist_Photos extends Model
{
    use HasFactory;

    protected $fillable = [
      'photo_name', 'img_dir'
    ];
}
