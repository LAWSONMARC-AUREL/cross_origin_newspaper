<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/articles/{source?}', [ArticleController::class, 'index']);
    Route::get('/fetch/lemonde', [ApiController::class, 'fetchLemonde']);
    Route::get('/fetch/lequipe', [ApiController::class, 'fetchLequipe']);
    Route::get('/', [ArticleController::class, 'list'])->name('list');
    Route::get('articles/{id}/show', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('articles/{articleId}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('articles/{articleId}/comments', [CommentController::class, 'store'])->name('comments.store');

});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
