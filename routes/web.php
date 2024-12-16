<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::post('/movies/{id}/send-email', [MovieController::class, 'sendEmail'])->name('movies.sendEmail');
