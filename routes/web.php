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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index']);

// Route::get('/posts/{data}', [PostController::class, 'test']);

// Route::get('/posts/{post}', [PostController::class, 'show']);の上に書くように気をつける
// {post}にcreateが入りshowが実行されてしまうため
Route::get('/posts/create', [PostController::class, 'create']);


// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);
// Route::post('/posts/{id}', [PostController::class, 'update']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'delete']);

Route::post('/posts', [PostController::class, 'store']);


// {post}の部分がコントローラークラスshowの引数として渡される
Route::get('/posts/{post}', [PostController::class, 'show']);





