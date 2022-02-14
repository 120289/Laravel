@extends('layouts.app')

@section('content')
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>

 <div>
    <a style="margin: 19px;" href="{{ route('genres.create')}}" class="btn btn-primary">genres toevoegen</a>
 </div>

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Genre</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Naam</td>
          <td> Origin Country</td>
          <td colspan = 2>Acties</td>
        </tr>
    </thead>
    <tbody>
        @foreach($genres as $genre)
        <tr>
            <td>{{$genre->genre_name}}</td>
            <td>{{$genre->origin_country}}</td>

            <td>
                <a href="{{ route('genres.edit',$genre->id)}}" class="btn btn-primary">Aanpassen</a>
            </td>
            <td>
                <form action="{{ route('genres.destroy', $genre->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
