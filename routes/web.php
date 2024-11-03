<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\HomeController;
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
Route::get('/about',  [AboutController::class, 'index'])->name('about');

Route::get('cats/search', [CatController::class, 'search'])->name('cats-list.search');
Route::resource('cats',  CatController::class)->names('cats-list');
Route::resource('admin', AdminController::class)->names('admin')->middleware(['\App\Http\Middleware\Admin::class']);

