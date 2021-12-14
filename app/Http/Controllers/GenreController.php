<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller {

    public function index(){
      $genres = Genre::all();
      return view('genres.index', compact ('genres'));
    }


    public function create(){
      return view('genres.create');
    }


    public function store(Request $request){
        $request->validate([
          'name' => 'required'
        ]);
        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre is aangemaakt!')
    }


    public function show(Genre $genre){
      return view('genres.show', compact('genre'));
    }


    public function edit(Genre $genre){
        return view('genres.edit', compact('genre'));
    }


    public function update(Request $request, $id){
      $request->validate([
     'name' =>'required'
      ]);
     $company->update($request->all());
     return redirect()->route('/genres')->with('succes', 'Genre is aangepast!');
    }

    public function destroy(Genre $genre){
        $album->delete();

        return redirect('/genres')->with('success', 'Genre is verwijderd!');
    }
}
