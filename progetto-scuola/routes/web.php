<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

Route::get('/', [HomeController::class,'view'])->name('homepage');

/*
|--------------------------------------------------------------------------
| ACCESSO
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login/user', [AuthController::class,'loginUser'])->name('login');

/*
|--------------------------------------------------------------------------
| UTENTI
|--------------------------------------------------------------------------
*/

Route::get('/users', [UsersController::class,'index'])->name('login');