<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\GenreController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/music/create', [MusicController::class, 'create'])->name('music.create');
Route::post('/music', [MusicController::class, 'store'])->name('music.store');
Route::get('/music/edit/{music}', [MusicController::class, 'edit'])->name('music.edit');
Route::put('/music/update/{music}', [MusicController::class, 'update'])->name('music.update');
Route::delete('/music/{music}', [MusicController::class, 'destroy'])->name('music.destroy');
Route::get('/music/{music}', [MusicController::class, 'show'])->name('music.show');

Route::post('/genre', [GenreController::class, 'store'])->name('genre.store');

