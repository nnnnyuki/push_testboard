<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [PostsController::class, 'index']);

Route::get('/create-form', [PostsController::class, 'createForm']);

Route::post('post/create', [PostsController::class, 'create']);

Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);

Route::post('/post/update', [PostsController::class, 'update']);

Route::get('post/{id}/delete', [PostsController::class, 'delete']);


//検索ページの実装　トッページを使用する
Route::get('/index', [PostsController::class, 'indexSearch']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Authのログインコントローラーを使用するため、useでAuthのコントローラーを引っ張ってくる。
