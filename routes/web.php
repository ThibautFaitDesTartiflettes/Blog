<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('posts', PostController::class)->except('index');

Route::get('/{categoryId?}', [PostController::class, 'index'])->name('posts.index');
Route::post('/recherche', [PostController::class, 'search'])->name('posts.search');
Route::post('/commentaire', [PostController::class, 'comment'])->name('posts.comment');
Route::get('/like/{id}', [PostController::class, 'like'])->name('posts.like');