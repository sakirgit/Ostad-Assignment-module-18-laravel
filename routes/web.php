<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;

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


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::delete('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');

Route::get('/categories/{id}/posts', [PostController::class, 'categoryPosts'])->name('categories.posts');

Route::get('/latest-posts', [CategoryController::class, 'latestPosts'])->name('categories.latestPosts');


Route::get('/home', function () {
    return Redirect::to('/dashboard', 302);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/settings', 'SettingsController@index');
});

Route::resource('products', ProductController::class);


Route::resource('posts', PostController::class);







