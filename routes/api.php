<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
    ]);
});

Route::post('/service/create-article', [ArticleController::class, 'createArticle']);

Route::post('/users', [UserController::class, 'store']);
Route::post('/users/token', [UserController::class, 'getToken']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'edit', 'store']);
    Route::resource('articles', ArticleController::class)->except(['create', 'edit']);
    Route::resource('integrations', IntegrationController::class)->only(['store', 'destroy']);
});
