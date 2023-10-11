<?php

use App\Http\Controllers\ArticleController;
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

Route::post('/users', [UserController::class, 'store']);
Route::post('/users/token', [UserController::class, 'getToken']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('users', UserController::class)->except(['create', 'edit', 'store']);
    Route::resource('articles', ArticleController::class)->except(['create', 'edit']);

    Route::get('/test', function (Request $request) {
        $articles = \App\Models\Article::all();
        $groupedArticles = $articles->groupBy('source')->toArray();

        $user = User::find(1);

//        dd($user->email, $articles, $groupedArticles);

        Mail::to($request->user())->send(new \App\Mail\NewsletterMail($groupedArticles));
    });
});
