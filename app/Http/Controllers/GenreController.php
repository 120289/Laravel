<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;

class GenreController extends Controller {

  public function index(Request $request)
  {
     $keyword = $request->keyword;
     if (isset($keyword)){
         $genres = Genres::genressearch($keyword);
       } else {
           $genres = Genres::all();
     }

   return view('genres.index', compact('genres'));
}


    public function create(){
      // $genres = Genre::pluck('name', 'country', 'id');
      return view('genres.create');
    }


    public function store(Request $request, Genres $genre){
        $request->validate([
          'genre_name' => 'required',
          'origin_country' => 'required'
        ]);
        Genres::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre is aangemaakt!');
    }


    public function show(Genres $genre){
      return view('genres.show', compact('genre'));
    }


    public function edit(Genres $genre){
        $genres = Genres::pluck('genre_name', 'origin_country', 'id');
        return view('genres.edit', compact('genre'));
    }


    public function update(Request $request, Genres $genre){
      $request->validate([
     'genre_name' =>'required',
     'origin_country' => 'required'
      ]);
     $genre->update($request->all());
     return redirect()->route('/genres')->with('succes', 'Genre is aangepast!');
    }

    public function destroy(Genres $genre){
        $genre->delete();

        return redirect('/genres')->with('success', 'Genre is verwijderd!');
    }
}
