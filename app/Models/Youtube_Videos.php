<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube_Videos extends Model
{
    use HasFactory;

    protected $fillable = [
      'yt_name', 'yt_url'
    ];
}
