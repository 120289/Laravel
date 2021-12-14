<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller {

    public function index(){
      $albums = Album::all();
      return view('albums.index', compact ('albums'));
    }


    public function create(){
      return view('albums.create');
    }


    public function store(Request $request){
        $request->validate([
          'name' => 'required'
        ]);
        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Album is aangemaakt!')
    }


    public function show(Album $album){
      return view('albums.show', compact('album'));
    }


    public function edit(Album $album){
        return view('albums.edit', compact('album'));
    }


    public function update(Request $request, $id){
      $request->validate([
     'name' =>'required'
      ]);
     $company->update($request->all());
     return redirect()->route('/albums')->with('succes', 'Album is aangepast!');
    }

    public function destroy(Album $album){
        $album->delete();

        return redirect('/albums')->with('success', 'Album is verwijderd!');
    }
}
