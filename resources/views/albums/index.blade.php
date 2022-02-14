@extends('layouts.app')

@section('content')
  <div class="row">
  <div class="col-sm-12">
    <h1 class="display-3 index-title" >Albums</h1>
    <div>
    <a style="margin: 19px;" href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate" class="btn btn-primary">Album toevoegen</a>
    </div>

        <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
           <td><a class="">Naam</a></td>
           <td><a class="">Datum</a></td>
           <td><a class="">Artiest</a></td>
          <td><a class=""></a></td>
        </tr>
      </thead>
      <tbody>
        @foreach($albums as $album)

        <tr>
          <td><a href="{{ route('albums.show',$album->id)}}">{{$album->album_name}}</a></td>
          <td><a class="">{{$album->date}}</a></td>
          @foreach($album->artists as $artist)
          <td><a class="">{{$artist->artist_name}}</a></td>
          @endforeach
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
