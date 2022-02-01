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
<div class="row">
  <a style="margin: 19px;" href="{{ route('albums.create')}}" class="btn btn-primary">Album toevoegen</a>
</div></div>


<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Albums</h1>
    <div class"" style="width:400px;">
          {!! Form::open(['method'=>'GET','url'=>'/albums/',
   'class'=>'navbar-form navbar-left','role'=>'search']) !!}
    <div class="input-group custom-search-form">
      <input type="text" class="form-control" name="keyword"placeholder="Zoek...">
           <span class="input-group-btn">
         <button class="btn btn-default-sm" type="submit">
           <i class="fa fa-search"><span class="glyphicon glyphicon-search"/>
         </button>
         </span>
       </div></div>
     {!! Form::close() !!}
  <table class="table table-striped">
 <thead>
 <tr>
 <td>ID</td>
 <td>Naam</td>
 <td>Datum</td>
 <!-- hier stond meer -->
 <td colspan = 2>Actions</td>
 </tr>
 </thead>
 <tbody>
 @foreach($albums as $album)
 <tr>
 <td>{{$album->id}}</td>
 <td>{{$album->first_name}} {{$album->last_name}}</td>
 <td>{{$album->date}}</td>
 <!-- hier stond meer -->
 <td>
 <a href="{{ route('album.edit',$album->id)}}"
class="btn btn-primary">Aanpassen</a>
 </td>
 <td>
 <form action="{{ route('album.destroy', $album->id)}}"
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
