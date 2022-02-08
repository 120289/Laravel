@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-sm-12">
    <h1 class="display-3">Albums</h1>
    <div>
       <button style="margin: 19px;" href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-primary">Artiest toevoegen</button>
    </div>

        <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>ID</td>
           <td>Naam</td>
           <td>Datum</td>
          <td colspan = 2>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($albums as $album)
        <tr>
          <td><a>{{$album->id}}</a></td>
          <td><a href="{{ route('albums.show',$album->id)}}">{{$album->album_name}}</a></td>
          <td><a>{{$album->date}}</a></td>
          <td>
            <a href="{{ route('albums.edit',$album->id)}}"
              class="btn btn-primary">Aanpassen</a>
          </td>
          <td>
            <form action="{{ route('albums.destroy', $album->id)}}"
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
    @include('albums.modal.create')
@endsection
