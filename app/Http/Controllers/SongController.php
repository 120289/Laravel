<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller {

    public function index(){
      $songs = Song::all();
      return view('songs.index', compact ('songs'));
    }


    public function create(){
      return view('songs.create');
    }


    public function store(Request $request){
        $request->validate([
          'name' => 'required'
        ]);
        Song::create($request->all());
        return redirect()->route('songs.index')->with('success', 'Het liedje is aangemaakt!')
    }


    public function show(Song $song){
      return view('songs.show', compact('song'));
    }


    public function edit(Song $song){
        return view('song.edit', compact('song'));
    }


    public function update(Request $request, $id){
      $request->validate([
     'name' =>'required'
      ]);
     $company->update($request->all());
     return redirect()->route('/songs')->with('succes', 'Het liedje is aangepast!');
    }

    public function destroy(Song $song){
        $song->delete();

        return redirect('/songs')->with('success', 'Het liedje is verwijderd!');
    }
}
