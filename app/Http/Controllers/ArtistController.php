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


    public function __construct(){
      $this->artist = new Artist();
      $this->album_photo = new Artist_Photos();
    }


    public function store(Request $req) {

      if($req->hasFile('artist_photo')) {
        $filenameWithExt = $req->file('artist_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('artist_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $req->file('artist_photo')->storeAs('public/artist_photos', $fileNameToStore);
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
          'photo_directory'=>$path,
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
      return view('artists.show', compact('artist'));
    }


    public function edit(Artist $artist) {
      return view('artists.edit', compact('artist'));

    }


    public function update(Request $request, Artist $artist) {
      $request->validate([
        'artist_name'=>'required',
        'biography'=>'required'
        ]);

      $artist->update($request->all());

      return redirect('/artists')
            ->with('success', 'De artiest is up to date!');
    }


    public function destroy(Artist $artist, Artist_Photos $artist_photos) {
    Artist_Photos::where("artists_id", $artist->id)->delete();
    $artist->delete();
    return redirect('/artists')
          ->with('success', 'Doei ');
    }
}
