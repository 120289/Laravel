<form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header gradient">
                    <h3 class="modal-title">{{ __('Creeër een album') }}</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <label for="album_name">Naam:</label>
                            <input type="text" class="form-control" name="album_name" required/>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <label for="date">Wanneer kwam het uit?:</label>
                            <input type="date" class="form-control" name="date"required/>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <label for="artist">Artist:</label>
                            <select name="artist" class="form-control">
                              @foreach($artists as $artist)
                              <option value="{{ $artist->id }}" required> {{$artist->artist_name}}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                            <input type="file" name="album_photo" required/>
                          </div>
                        </div><br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <button id="myButton" type="submit" class="btn btn-success">{{ __('Creeër!') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</form>
