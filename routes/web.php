<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/post/like/{post}',[PostController::class,'like'])->name('like');
Auth::routes();
Route::resource('/', HomeController::class);

Route::middleware(['auth'])->group(function () {
    Route::post('/admin/comment/store/{post}',[PostController::class,'storeComment'])->name('comments.store');
    Route::resource('/user/posts', UserPostController::class);




});
Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/posts', PostController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/tag', TagController::class);
    Route::resource('/admin/comment', CommentController::class);

});

/* Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/signup',[LoginController::class,'signup'])->name('signup');
Route::post('/registertion',[LoginController::class,'registertion'])->name('registertion'); */
Route::get('/post/publish/{post}',[PostController::class,'publish'])->name('post.publish');


Route::get('/loggingout',[LoginController::class,'loggingout'])->name('loggingout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
