@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Artiest aanpassen</h1>

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

    <form method="post"
      action="{{ route('artists.update', $artist->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="form-group">
          <label for="artist_name">Naam:</label>
          <input type="text" class="form-control" name="artist_name"
            value={{ $artist->artist_name }} />
          </div>
      <div class="form-group">
          <label for="biography">Biografie:</label>
          <input type="text" class="form-control" name="biography"
            value={{ $artist->biography }} />
        </div>
        <div class="form-group">
          <input type="file" name="artist_photo"/>
        </div>
          <button type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
    </div>
</div>
@endsection
