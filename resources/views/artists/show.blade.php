@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">{{$artist->artist_name}}</h1>

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
      <a style="margin: 19px;" href="{{ route('artists.index')}}"
        class="btn btn-primary">Overzicht</a>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        @foreach($artist->albums as $album)
        <a class="col-xs-4 col-sm-4 col-md-4" href="{{ route('albums.show',$album->id) }}">{{$album->album_name}}</a>
          @endforeach
    </div>


   <!-- hier stond meer -->
    </tbody>
 </table>
 </div>
</div>
@endsection
