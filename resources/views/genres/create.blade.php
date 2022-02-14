
@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Genre toevoegen</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
      <form method="post" action="{{ route('genres.store') }}">
@csrf
        <div class="form-group">
          <label for="genre_name">Naam:</label>
          <input type="text" class="form-control" name="genre_name"/>
        </div>

        <div class="form-group">
          <label for="origin_country">Origin:</label>
          <input type="text" class="form-control" name="origin_country"/>
        </div>

          <button type="submit" class="btn btn-primary">Toevoegen</button>
      </form>
  </div>
</div>
</div>
@endsection
