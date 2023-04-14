<?php

namespace App\Http\Controllers;

use App\Models\Favoritos;
use Illuminate\Http\Request;


class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $name)
    {
        //OJO RECUERDA DEBES TERMINAR EL FAVORITO PASA ESTO AL METODO STORE PARA QUE GUARDE DE MANERA AUTOMATICA  
        //Y RETORNE  A LA VISTA INDEX SINO PILLA LA BUSQUEDA QUE HICISTE 
        //EN CHATGPT
        $entytistore = new Favoritos;
        $entytistore->id_usuario = auth()->user()->id;
        $entytistore->ref_api = $name;

        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $pokemonList = file_get_contents('https://pokeapi.co/api/v2/pokemon');
        $pokemonList = json_decode($pokemonList);

        $entytistore->save();
    
        return view('pokemon.index', compact('pokemonList'));
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    { //OJO RECUERDA DEBES TERMINAR EL FAVORITO PASA ESTO AL METODO STORE PARA QUE GUARDE DE MANERA AUTOMATICA  
        //Y RETORNE  A LA VISTA INDEX SINO PILLA LA BUSQUEDA QUE HICISTE 
        //EN CHATGPT
       
        if (!auth()->check()) {
            return redirect('/login');
        }
    
        $pokemonList = file_get_contents('https://pokeapi.co/api/v2/pokemon');
        $pokemonList = json_decode($pokemonList);
    
        return view('pokemon.index', compact('pokemonList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favoritos $favoritos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favoritos $favoritos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $name)
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    $pokemonList = file_get_contents('https://pokeapi.co/api/v2/pokemon');
    $pokemonList = json_decode($pokemonList);


    $favorito = Favoritos::where('ref_api', $name)
                    ->where('id_usuario', auth()->id())
                    ->first();

    if ($favorito) {
        $favorito->delete();
        return view('pokemon.index', compact('pokemonList'))->with('success', 'El pokemon ha sido eliminado de tu lista de favoritos');
    } else {
        return view('pokemon.index', compact('pokemonList'))->with('error', 'No se ha encontrado el pokemon en tu lista de favoritos');
    }
}
}
