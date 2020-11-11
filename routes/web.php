<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;




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

Route::get('/', [PostController::class, "index"]);
Route::post('/create', [PostController::class, "create"])->name('create.post');
Route::get('/posts', [PostController::class, "fetchallpost"])->name("fetchall.posts");
Route::get('/post/{id}', [PostController::class, "singlepost"]);
Route::get('/post-delete/{id}', [PostController::class, "deletepost"]);
Route::get('/post-edit/{id}', [PostController::class, "edit"]);
Route::post('/post-update/{id}', [PostController::class, "update"]);

// datatable
Route::get('users', [UserController::class, 'index'])->name("users.index");






