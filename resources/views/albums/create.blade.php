@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Album toevoegen</h1>
    </div>
        <form action="{{ route('albums.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="body">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label for="album_name">Naam:</label>
                <input type="text" class="form-control" name="album_name"/>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <label for="date">Wanneer kwam het uit?:</label>
                <input type="date" class="form-control" name="date"/>
              </div>
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
          </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <input type="file" name="album_photo"/>
              </div>
            </div>
            <div><br>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <button id="myButton" type="submit" class="btn btn-success">{{ __('Creeër!') }}</button>
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection
