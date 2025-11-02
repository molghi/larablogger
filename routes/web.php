<?php

use App\Http\Controllers\PageController;
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

// Show login form
Route::get('/', [PageController::class, 'show_login_form'])->name('login');

// Show login form
Route::get('/login', [PageController::class, 'show_login_form']);

// Show signup form
Route::get('/signup', [PageController::class, 'show_signup_form']);
