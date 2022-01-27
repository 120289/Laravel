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
    <a style="margin: 19px;" href="{{ route('artists.create')}}" class="btn btn-primary">artists toevoegen</a>
 </div>

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">artists</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Naam</td>
          <td colspan = 2>Acties</td>
        </tr>
    </thead>
    <tbody>
        @foreach($artists as $artist)
        <tr>
            <td>{{$artist->name}}</td>
            <td>
                <a href="{{ route('artists.edit',$artists->id)}}" class="btn btn-primary">Aanpassen</a>
            </td>
            <td>
                <form action="{{ route('artists.destroy', $artists->id)}}" method="post">
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
