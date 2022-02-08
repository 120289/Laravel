@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">Artiesten</h1>
    <div>
       <a style="margin: 19px;" href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-primary">Artiest toevoegen</a>
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
          <td><a>{{$artist->id}}</a></td>
          <td><a href="{{ route('artists.show',$artist->id)}}">{{$artist->artist_name}}</a></td>
          <td><a>{{$artist->biography}}</a></td>
          <td>
            <a data-bs-toggle="modal" data-bs-target="#ModalEdit"
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
  @include('artists.modal.create')
  @include('artists.modal.edit')
@endsection
