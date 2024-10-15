<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/cats-list', [ListController::class, 'index'])->name('cats-list');
Route::get('/about',  [AboutController::class, 'index'])->name('about');
Route::get('/contact',  [ContactController::class, 'index'])->name('contact');

Route::resource('cats-list',  CatController::class);
