@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-8">
    @foreach ($artist_photos as $artist_photo)
    <img src="{{ asset('storage/artist_photos/' . $artist_photo->photo_name) }}" class="artist-image"/>
    @endforeach
    <label class="artist-page-label"> Artist: </label>
    <h1 class="artist-name">{{$artist->artist_name}}</h1>
    <div class="artist-middle-row">
      <a href="{{ route('artists.index')}}"
        class="btn btn-success index-button">Overzicht</a>
    </div>
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
