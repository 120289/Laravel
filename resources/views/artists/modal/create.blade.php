<form action="{{ route('artists.store') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header gradient">
                    <h3 class="modal-title">{{ __('Creeër een artiest') }}</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <label for="artist_name">Naam:</label>
                          <input type="text" class="form-control" name="artist_name"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <label for="biography">Biografie:</label>
                          <input type="text" class="form-control biography" rows="8" name="biography"/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <label for="artist_photo">Foto:</label>
                          <input type="file" multiple accept="image/*" class="form-control" name="artist_photo">
                        </div>
                    </div><br>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button id="myButton"type="submit" class="btn btn-success">{{ __('Creeër!') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
