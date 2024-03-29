<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Artist;
Use App\Models\Album;
Use App\Models\Album_Photos;
use App\Models\Artist_Photos;
Use DB;


class ArtistController extends Controller {
protected $artist;
protected $artist_photo;
    //geeft een overzicht van artiesten
    public function index() {
      $artists = Artist::all();
      return view('artists.index', compact ('artists'));
    }

    //een store functie
    public function store(Request $req) {
      //kijkt naar de artist_photo en zorgt dat (als er een foto is ) dat deze de goede naam conventie krijgt en op de juiste plaats opslaat.
      if($req->hasFile('artist_photo')) {
        $filenameWithExt = $req->file('artist_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('artist_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $req->file('artist_photo')->storeAs('public/artist_photos', $fileNameToStore);
      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      //Gebruik DB:beginTransaction omdat het makkelijk is om in meerdere tabellen op te slaan.
      DB::beginTransaction();
      try {
        $artist = Artist::Create([
          'artist_name'=>$req->artist_name,
          'biography'=>$req->biography,
        ]);
        $artist_photo = Artist_Photos::create([
          'photo_name'=>$fileNameToStore,
          'artist_id'=>$artist->id,
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

  //Laat de specifieke artiest zien
    public function show(Artist $artist, Album $album )  {
      $artist = Artist::find($artist->id);
      $artist_photos = $artist->artist_photos;
      return view('artists.show', ['artist' => $artist],['artist_photos'=>$artist_photos]);
    }

    //Redirect naar een edit functie
    public function edit(Artist $artist, Artist_Photos $artist_photo) {
      return view('artists.edit', compact('artist','artist_photo'));

    }


    public function update(Request $req, Artist $artist, Artist_Photos $artist_photo) {
            //Kijkt of er een artiesten foto in de edit wordt gestuurd, zo ja; zorgt het er weer voor om de correcte naam conventies te krijgen en de juiste loatie om makkelijk te callen
            if($req->hasFile('artist_photo')) {
              $filenameWithExt = $req->file('artist_photo')->getClientOriginalName();
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              $extension = $req->file('artist_photo')->getClientOriginalExtension();
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              $req->file('artist_photo')->storeAs('public/artist_photos', $fileNameToStore);
              $photo = Artist_Photos::where('artist_id', "=",$artist->id)->first();
              $photo->photo_name  = $fileNameToStore;
              $photo->save();

            }
            $artist->update([
              'artist_name'=>$req->artist_name,
              'biography'=>$req->biography,
            ]);
            return redirect('/artists');
          }

    //verwijdert de artist en de bijbehorende gelinkte foto(s)
    public function destroy(Artist $artist, Artist_Photos $artist_photos) {
    Artist_Photos::where("artist_id", $artist->id)->delete();
    $artist->delete();
    return redirect('/artists')
          ->with('success', 'Doei ');
    }
}
