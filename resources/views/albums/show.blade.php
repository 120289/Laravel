@extends('layouts.app')

@section('content')
<div class="row top">
  <div class="col-sm8">
    @foreach ($album_photos as $album_photo)
    <img src="{{ asset('storage/album_photos/' . $album_photo->photo_name) }}" class="mx-auto d-block album-image"/>
    @endforeach
  </div>
  <div class="col-sm-8 offset-sm-2">
    <h1 class="album_name">{{$album->album_name}}</h1>
    <h5 class="album-date">{{$album->date}}</h5>
    @foreach($album->artists as $artist)
    <h3 class="artist_name"><a class="faceless" href="{{route ('artists.show',$artist->id)}}"> {{$artist->artist_name}} </a></h3>
    @endforeach

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br />
    @endif
<!--
    <div>
      <a style="margin: 19px;" href="{{ route('albums.index')}}"
        class="btn btn-primary">Overzicht</a>
    </div> -->


 </div>
</div>
@endsection
