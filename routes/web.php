<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\FavoritosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->get('/pokemon', [PokemonController::class, 'index'])->name('pokemon');;
Route::middleware(['auth'])->get('/pokemon/{name}', [PokemonController::class, 'show'])->name('pokemon.show');

Route::middleware(['auth'])->get('/favorito/{name}', [FavoritosController::class, 'store'])->name('pokemon.fav');
Route::delete('/favoritos/{name}', [FavoritosController::class, 'destroy'])->name('favoritos.destroy');
