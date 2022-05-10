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

    //Laat alle albums en artiesten zien
    public function index(){
      $albums= Album::all();
      $artists= Artist::all();
      return view ('albums.index', compact('albums','artists'));
    }

    //Redirect naar een toevoegpagina.
    public function create(Artist $artist){
      $albums= Album::all();
      $artists= Artist::all();
      return view ('albums.create', compact('albums','artists'));
    }

    //Redirect naar een editpagina, hij laad de artiest in die je aan hebt geklikt om te editen, zodat hij de values als placeholder kan gebruiken in het edit scherm
    public function edit(Album $album, Artist $Artist){
      $artists= Artist::all();
    return view ('albums.edit', compact('album', 'artists'));
  }

  //Store functie
    public function store(Request $req, Artist $artist, Album $album) {
      //Zorgt ervoor dat de foto die toegevoegd is een goede naam conventie en goed opslagen wordt in de public map in Laravel,
      //zodat je hem makkelijk kan callen.
      if($req->hasFile('album_photo')) {
        $filenameWithExt = $req->file('album_photo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $req->file('album_photo')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $req->file('album_photo')->storeAs('public/album_photos', $fileNameToStore);

      } else {
        $fileNameToStore = 'noimage.jpg';
      }
      //Storet de data die de functie binnen krijgt. Het gebruikt DB::beginTransaction zodat je makkelijk in meerdere tabellen kan storen.
      //Als het goed lukt, commit het naar de database, anders wordt krijgt de functie een rollback.
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


    //Een functie om een specifieke album te laten zien, Het laad de bijbehorende foto en artiest ook in.
    public function show(Album $album, Artist $artist, Album_Photos $Album_Photos){
      $album =  Album::find($album->id);
      $album_photos = $album->album_photos;
      $artists = Artist::all();
      return view('albums.show', ['album' => $album],['album_photos'=>$album_photos]);
    }

    //Een update functie
    public function update(Request $req, Album $album, Artist $artist){
       $album->artists()->detach();
      //Het kijkt of er een foto wordt vestuurd.
      //Wordt er een foto verstuurd zorgt het er weer voor dat de foto de goede naam conventie en locatie krijgt om makkelijk te callen
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
       //Een update voor de 'albums' table. Hierna wordt je terug gestuurd naar de hoofdpagina van albums.
        $album->update([
        'album_name'=>$req->album_name,
         'date'=>$req->date,
        ]);
       $album->artists()->attach($req->artist);
       return redirect('/albums');
      }

    //Een verwijder functie. Hij verwijdert ook direct de gelinkte album photo. Stuurt je daarna nogmaals terug naar de hoofdpagina van albums
    public function destroy(Album $album, Album_Photos $album_photos, Album_Artist $Album_Artist) {
    Album_Photos::where("album_id", $album->id)->delete();
    Album_Artist::where("album_id", $album->id)->delete();
    $album->delete();
    return redirect('/albums')
          ->with('success', 'Doei ');
    }
}
