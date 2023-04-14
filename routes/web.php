<?php

use App\Http\Controllers\UserControlerhgh;
use App\Http\Controllers\UserController;
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
    return view('main');
})->name('main');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/create', function () {
    return view('create');
})->name('create');
//add cat
Route::post('/categories', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
// view of page
Route::get('/categs', [App\Http\Controllers\CategoryController::class, 'index'])->name('categs');
//delete cat
Route::post('/categsd', [App\Http\Controllers\CategoryController::class, 'delete'])->name('categs.destroy');

use App\Http\Controllers\PhotoController;


Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');


Route::post('/photoss', [App\Http\Controllers\PhotoController::class, 'store'])->name('photos.store');

Route::get('/categorieslist', [App\Http\Controllers\CategoryController::class, 'indexWithPhotos'])->name('categories.indexWithPhotos');
