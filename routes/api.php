<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'show']);
