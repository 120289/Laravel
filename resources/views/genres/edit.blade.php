@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3"></h1>

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
        <form method="post" action="{{ route('genres.update', $genre->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="genre_name">Naam:</label>
                <input type="text" class="form-control" name="genre_name" value="{{ $genre->genre_name }}" />
            </div>

            <div class="form-group">

                <label for="origin_country">Origin:</label>
                <input type="text" class="form-control" name="origin_country" value="{{ $genre->origin_country }}" />
            </div>


            <button type="submit" class="btn btn-primary">Aanpassen</button>
        </form>
    </div>
</div>
@endsection
