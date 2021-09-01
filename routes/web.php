<?php

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

Route::get('/home/{id}', [HomePageController::class, 'index']);

Route::get('/hello', function () {
    return 'Hello world!';
});

Route::get('/users/{id?}', function ($id = 'No Id provided') {
    return 'user id is : ' . $id;
});

Route::get('/view', function () {
    return view('child');
});

Route::get('/', function () {
    return view('welcome', [
        'name' => 'Mustafa'
    ]);
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);

Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.create');