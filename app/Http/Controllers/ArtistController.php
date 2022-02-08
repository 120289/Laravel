<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Artist;
use App\Models\Artist_Photos;
Use DB;


class ArtistController extends Controller {
protected $artist;
protected $artist_photo;

    public function index() {
      $artists = Artist::all();
      return view('artists.index', compact ('artists'));
    }


    public function create()  {
      return view('artists.create');
    }

    public function store(Request $req) {

      if($req->hasFile('artist_photo')) {
        $filenameWithExt = $req->file('artist_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('artist_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $req->file('artist_photo')->storeAs('public/artist_photos', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      DB::beginTransaction();
      try {
        $artist = Artist::Create([
          'artist_name'=>$req->artist_name,
          'biography'=>$req->biography,
        ]);
        $artist_photo = Artist_Photos::create([
          'photo_name'=>$fileNameToStore,
          'artists_id'=>$artist->id,
        ]);
        if($artist && $artist_photo){
          DB::commit();
          return redirect()->route('artists.index');
        }
      }
      catch(Exception $ex){
        DB::rollback();
      }
}


    public function show(Artist $artist)  {
      $artist = Artist::find($artist->id);
      return view('artists.show', ['artist' => $artist]);
    }


    public function edit(Artist $artist, Artist_Photos $artist_photo) {
      return view('artists.edit', compact('artist','artist_photo'));

    }


    public function update(Request $req, Artist $artist, Artist_Photos $artist_photo) {

            if($req->hasFile('artist_photo')) {
              $filenameWithExt = $req->file('artist_photo')->getClientOriginalName();
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              $extension = $req->file('artist_photo')->getClientOriginalExtension();
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              $req->file('artist_photo')->storeAs('public/artist_photos', $fileNameToStore);
              $photo = Artist_Photos::where('artists_id', "=",$artist->id)->first();
              $photo->photo_name  = $fileNameToStore;
              $photo->save();

            }
            $artist->update([
              'artist_name'=>$req->artist_name,
              'biography'=>$req->biography,
            ]);
            return redirect('/artists');
          }


    public function destroy(Artist $artist, Artist_Photos $artist_photos) {
    Artist_Photos::where("artists_id", $artist->id)->delete();
    $artist->delete();
    return redirect('/artists')
          ->with('success', 'Doei ');
    }
}
