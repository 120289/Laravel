@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Album bekijken</h1>

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

    <div>
      <a style="margin: 19px;" href="{{ route('album.index')}}"
        class="btn btn-primary">Overzicht</a>
    </div>

   <table class="table table-striped">
   <tbody>
     <tr>
       <td>Naam:</td>
       <td>{{ $album->album_name }}</td>
     </tr>
   <!-- hier stond meer -->
    </tbody>
 </table>
 </div>
</div>
