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

   <form method="post" action="{{ route('albums.update', $album->id) }}">
      @method('PATCH')
      @csrf
      <div class="form-group">
        <label for="album_name">Voornaam:</label>
        <input type="text" class="form-control" name="album_name" value="{{ $album->album_name }}" />
      </div>
      <div class="form-group">
        <label for="date">Voornaam:</label>
        <input type="date" class="form-control" name="date" value="{{ $album->date }}" />
    </div><br>
      <div class="form-group">
        <input type="file" class="form-control" name="album_photo"/>
      </div><br>
     <button type="submit" class="btn btn-primary">Aanpassen</button>
   </form>
   </div>
  </div>
@endsection