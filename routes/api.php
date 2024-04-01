<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [UserController::class, 'register']);
});

Route::get('index', [PostController::class, 'index']);
Route::post('post/store', [PostController::class, 'store']);
Route::delete('post/delete/{id}', [PostController::class, 'destroy']);
Route::post('post/like/{id}', [LikeController::class, 'like']);

Route::get('comment/{id}', [CommentController::class, 'index']);
Route::post('comment/store', [CommentController::class, 'store']);
