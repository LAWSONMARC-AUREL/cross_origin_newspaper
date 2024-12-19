<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles/{source?}', [ArticleController::class, 'index']);

Route::get('/fetch/lemonde', [ApiController::class, 'fetchLemonde']);

Route::get('/fetch/lequipe', [ApiController::class, 'fetchLequipe']);

