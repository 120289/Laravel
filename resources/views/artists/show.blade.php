@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8">
    @foreach ($artist_photos as $artist_photo)
    @if ($artist_photo != null)
    <img src="{{ asset('storage/artist_photos/' . $artist_photo->photo_name) }}" class="artist-image"/>
    @endif
    @endforeach
    <label class="artist-page-label"> Artist: </label>
    <h1 class="artist-name">{{$artist->artist_name}}</h1>
      <a href="{{ route('artists.edit', $artist->id) }}"
        class="btn btn-success index-button">Aanpassen</a>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <ul class="no-bullets">
            @foreach($artist->albums as $album)
            <li><a class="col-xs-4 col-sm-4 col-md-4" href="{{ route('albums.show',$album->id) }}">{{$album->album_name}} ({{$album->date}})</a></li>


              @endforeach
            </ul>
        </div>
    </div>
  </div>
</div>

@endsection
