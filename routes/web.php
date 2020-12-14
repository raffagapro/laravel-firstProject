<?php

use Illuminate\Support\Facades\Route;
// Importing our custom controlller
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;

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

// Route::get('/post', function () { return view('post.index'); });
Route::get('/', function () { return view('home'); })->name('home');

// We create a controler in terminal with
// php artisan make:controller Auth\\RegisterController
// This creates the folder "Auth" and file "RegisterController" in the app folder
// Inside "RegisterControler" File we set up the view and method, and call it here
// We also have to import it at the top
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/post', [PostsController::class, 'index'])->name('posts');
Route::post('/post', [PostsController::class, 'store']);
Route::delete('/post/{post}', [PostsController::class, 'destroy'])->name('post.destroy');


// We put the name of the Model we are trying to pass '{post}'
Route::post('/post/{post}/like', [LikeController::class, 'store'])->name('like');
Route::post('/post/{post}/dislike', [DislikeController::class, 'store'])->name('dislike');

// Route::get('/dashboard', [DashboardController::class, 'index'])
//   ->name('dashboard')
//   ->middleware('auth');
