<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Show login form (root page)
Route::get('/', [PageController::class, 'show_login_form'])->name('login');

// Show login form (login route)
Route::get('/login', [PageController::class, 'show_login_form']);

// Show signup form
Route::get('/signup', [PageController::class, 'show_signup_form']);

// Make user
Route::post('/signup', [UserController::class, 'store'])->name('user.create');

// Log in
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// Log out
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show posts
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');

// Show add post form
Route::get('/posts/add', [PageController::class, 'show_add_form'])->middleware('auth');

// Show post
Route::get('/posts/{id}', [PostController::class, 'show_post'])->middleware('auth');

// Add post
Route::post('/posts/add', [PostController::class, 'store'])->name('post.add')->middleware('auth');

// Delete post
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.delete')->middleware('auth');

// Show edit post form
Route::get('/posts/edit/{id}', [PageController::class, 'show_edit_form'])->middleware('auth');

// Edit/update post
Route::put('/posts/edit/{id}', [PostController::class, 'update'])->name('post.edit')->middleware('auth');