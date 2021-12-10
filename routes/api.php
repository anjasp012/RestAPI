<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout');


Route::middleware(['auth:api'])->group(function () {
    Route::get('user', UserController::class);
    Route::post('create-new-article', [ArticleController::class, 'store']);
    Route::patch('update-article/{article}', [ArticleController::class, 'update']);
    Route::delete('delete-article/{article}', [ArticleController::class, 'destroy']);
});

Route::get('articles/{article}', [ArticleController::class, 'show']);
Route::get('articles', [ArticleController::class, 'index']);