<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/connect', [LoginController::class, 'connect'])->name('connect');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/deconnexion', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('Admin');
    Route::post('/dashboard/addAct', [PostController::class, 'store'])->name('posts.store');
    Route::put('/dashboard/updateAct', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/dashboard/deleteAct', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/{categoryId?}', [PostController::class, 'index'])->name('posts.index');
Route::post('/recherche', [PostController::class, 'search'])->name('posts.search');
Route::post('/commentaire', [PostController::class, 'comment'])->name('posts.comment');
Route::get('/like/{id}', [PostController::class, 'like'])->name('posts.like');
