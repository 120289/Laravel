@extends('layouts.app')

@section('content')
<div class="album-row-top">
  <div class="col-sm8">
    @foreach ($album_photos as $album_photo)
    <img src="{{ asset('storage/album_photos/' . $album_photo->photo_name) }}" class="album-image"/>
    @endforeach
    <label class="album-name-label"> Album: </label>
    <h1 class="album-name">{{$album->album_name}}</h1>
    @foreach($album->artists as $artist)
    <label class="artist-name-label"> Artist: </label>
    <h2 class="artist-name"><a class="faceless" href="{{route ('artists.show',$artist->id)}}"> {{$artist->artist_name}} </a></h2>
    @endforeach
  </div>
</div>


    <div class="album-middle-row">
      <a href="{{ route('albums.edit', $album->id) }}"
        class="btn btn-success change-button">Aanpassen</a>
    </div>
@endsection
