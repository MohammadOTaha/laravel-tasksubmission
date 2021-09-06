<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomePageController;
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

//Route::get('/home/{id}', [HomePageController::class, 'index']);
//
//Route::get('/hello', function () {
//    return 'Hello world!';
//});
//
//Route::get('/users/{id?}', function ($id = 'No Id provided') {
//    return 'user id is : ' . $id;
//});
//
//Route::get('/view', function () {
//    return view('child');
//});
//
Route::get('/', function () {
    return view('welcome', [
        'name' => 'Mustafa'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store'])->name('posts.create');
    Route::post('/posts/{post_id}/comments', [CommentController::class, 'store'])->name('comments.create');
    Route::post('/like/{post_id}', [ReactionController::class, 'storeLike'])->name('posts.like');
    Route::post('/dislike/{post_id}', [ReactionController::class, 'storeDislike'])->name('posts.dislike');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{user_id}', [ProfileController::class, 'index']);
