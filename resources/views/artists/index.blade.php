@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">Artiesten</h1>
    <div>
       <a style="margin: 19px;" href="{{ route('artists.create')}}" class="btn btn-primary">Artiest toevoegen</a>
    </div>

        <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>ID</td>
           <td>Naam</td>
           <td>Biografie</td>
          <td colspan = 2>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($artists as $artist)
        <tr>
          <td>{{$artist->id}}</td>
          <td>{{$artist->artist_name}}</td>
          <td>{{$artist->biography}}</td>
          <td>
            <a href="{{ route('artists.edit',$artist->id)}}"
              class="btn btn-primary">Aanpassen</a>
          </td>
          <td>
            <form action="{{ route('artists.destroy', $artist->id)}}"
                method="post">
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
