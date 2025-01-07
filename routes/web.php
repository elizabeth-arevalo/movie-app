<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

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
    $movies = Movie::all();  
    return view('main', compact('movies'));
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/billboard', function () {
    $movies = Movie::all();  
    return view('billboard', compact('movies'));
});

Route::get('/dashboard', function () {
    $movies = Movie::all();  // Obtener todas las películas
    return view('dashboard', compact('movies'));  // Pasar la variable $movies a la vista
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('movies', MovieController::class);
});

require __DIR__.'/auth.php';
