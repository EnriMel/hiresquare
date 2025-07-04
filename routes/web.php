<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [JobController::class, 'index']);

// Job creation
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

// Search
Route::get("/search", SearchController::class);
Route::get("/tags/{tag:name}", TagController::class);

// Authentication
Route::middleware('guest')->group(function() {
  Route::get('/register', [RegisteredUserController::class, 'create']);
  Route::post('/register', [RegisteredUserController::class, 'store']);
  Route::get('/login', [SessionController::class, 'create']);
  Route::post('/login', [SessionController::class, 'store']);
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

