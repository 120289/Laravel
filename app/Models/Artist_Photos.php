<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class Artist_Photos extends Pivot {
  use HasFactory;
  protected $table = 'artist_photos';
  protected $fillable = [
    'photo_name', 'photo_directory','artist_id'
  ];

    public function artists(){
      return $this->belongsTo(Artist::class,'artist_id');
    }
}
