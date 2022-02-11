@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Album aanpassen</h1>
   @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
   @endif

   <form method="post" action="{{ route('albums.update', $album->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="album_name">Voornaam:</label>
        <input type="text" class="form-control" name="album_name" value="{{ $album->album_name }}" />
      </div>
      <div class="form-group">
        <label for="date">Voornaam:</label>
        <input type="date" class="form-control" name="date" value="{{ $album->date }}" />
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="album_photo">Album Foto:</label>
        <input type="file" class="form-control" name="album_photo"/>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <label for="artist">Artist:</label>
          <select name="artist" class="form-control">
            <option> --- Kies artiest ---</option>
            @foreach($artists as $artist)
            <option value="{{ $artist->id }}"> {{$artist->artist_name}}</option>
            @endforeach
          </select>
      </div>
    </div><br>
     <button type="submit" class="btn btn-primary">Aanpassen</button>
   </form>
   </div>
  </div>
@endsection
