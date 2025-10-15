<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LinkController::class, 'index']);
Route::post('/shorten', [LinkController::class, 'store'])->name('shorten');
Route::get('/{code}', [LinkController::class, 'redirect']);
