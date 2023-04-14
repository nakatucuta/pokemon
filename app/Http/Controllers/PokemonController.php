<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $pokemonList = file_get_contents('https://pokeapi.co/api/v2/pokemon');
        $pokemonList = json_decode($pokemonList);
    
        return view('pokemon.index', compact('pokemonList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $pokemon = file_get_contents('https://pokeapi.co/api/v2/pokemon/' . $name);
        $pokemon = json_decode($pokemon);
    
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
