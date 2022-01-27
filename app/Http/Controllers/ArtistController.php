<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Artist;


class ArtistController extends Controller {

    public function getUserDetail($id){
      return view('Artist')->with(['id'=> $id]);
    }

    public function index(){
      $artists = Artist::all();
      return view('artists.index', compact ('artists'));
    }


    public function create(){
      return view('artists.create');
    }


    public function store(Request $request){
        $request->validate([
          'name' => 'required'
        ]);
        Album::create($request->all());
        return redirect()->route('artists.index')->with('success', 'Deze artiest is aangemaakt!');
    }


    public function show(Artist $artist){
      return view('artists.show', compact('artist'));
    }


    public function edit(Artist $artist){
        return view('artists.edit', compact('artist'));
    }


    public function update(Request $request, $id){
        $request->validate([
          'name' =>'required'
        ]);
        $company->update($request->all());
        return redirect()->route('/artist')->with('succes', 'Deze artiest is aangepast!');
    }

    public function destroy(Artist $Artist){
        $artist->delete();

        return redirect('/artists')->with('success', 'Deze artiest is verwijderd!');
    }
}
