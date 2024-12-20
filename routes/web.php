<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/{source?}', [ArticleController::class, 'index']);

Route::get('/fetch/lemonde', [ApiController::class, 'fetchLemonde']);

Route::get('/fetch/lequipe', [ApiController::class, 'fetchLequipe']);

Route::get('/', [ArticleController::class, 'list'])->middleware('auth');

Route::get('articles/{id}/show', [ArticleController::class, 'show'])->name('articles.show');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
