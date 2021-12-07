<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top10 extends Model
{
    use HasFactory;

    protected $fillable = [
      'First_name', 'Album_name', 'artist_name';
    ];
}
