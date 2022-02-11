<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Album;
Use App\Models\Artist;
use App\Models\Album_Photos;
use App\Models\Album_Artist;
Use DB;

class AlbumController extends Controller {
  protected $album;
  protected $album_photo;


    public function index(){
      $albums= Album::all();
      $artists= Artist::all();
      return view ('albums.index', compact('albums','artists'));
    }


    public function create(Artist $artist){
      $albums= Album::all();
      $artists= Artist::all();
      return view ('albums.create', compact('albums','artists'));
    }


    public function edit(Album $album){
    return view ('albums.edit', compact('album'));
  }

    public function store(Request $req, Artist $artist, Album $album) {

      if($req->hasFile('album_photo')) {
        $filenameWithExt = $req->file('album_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('album_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $req->file('album_photo')->storeAs('public/album_photos', $fileNameToStore);

      } else {
        $fileNameToStore = 'noimage.jpg';
      }

       DB::beginTransaction();
              try {
         $album = Album::Create([
           'album_name'=>$req->album_name,
           'date'=>$req->date,
         ]);
           $album_photo = Album_Photos::create([
           'photo_name'=>$fileNameToStore,
           'album_id'=>$album->id,
         ]);
         $album->artists()->attach($req->artist);

          if($album && $album_photo){
            DB::commit();
           return redirect()->route('albums.index');
          }
        }
        catch(Exception $ex){
          DB::rollback();
        }
      }



    public function show(Album $album){
      $album =  Album::find($album->id);
      return view('albums.show', ['album' => $album]);
    }


    public function update(Request $req, Album $album, Album_Photos $album_photo ){

      if($req->hasFile('album_photo')) {
        $filenameWithExt = $req->file('album_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('album_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $req->file('album_photo')->storeAs('public/album_photos', $fileNameToStore);
        $photo = Album_Photos::where('album_id', "=",$album->id)->first();
        $photo->photo_name  = $fileNameToStore;
        $photo->save();

      }
      $album->update([
        'album_name'=>$req->album_name,
        'date'=>$req->date,
      ]);
      return redirect('/albums');
    }


    public function destroy(Album $album, Album_Photos $album_photos, Album_Artist $Album_Artist) {
    Album_Photos::where("album_id", $album->id)->delete();
    Album_Artist::where("album_id", $album->id)->delete();
    $album->delete();
    return redirect('/albums')
          ->with('success', 'Doei ');
    }
}
