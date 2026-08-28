<?php

use App\Http\Controllers\CMS\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskBoardController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\TypeController;
use App\Http\Controllers\CommentController;

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

Route::put('/tasks/{id}', [TaskBoardController::class, 'updateTask'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    Route::post('/categories', [CategoryController::class, 'store']);

    Route::get('/types', [TypeController::class, 'index']);
    Route::post('/types', [TypeController::class, 'store']);
    Route::put('/types/{type}', [TypeController::class, 'update']);
    Route::delete('/types/{type}', [TypeController::class, 'destroy']);

    Route::get('/statuses', [StatusController::class, 'index']);
    Route::post('/statuses', [StatusController::class, 'store']);
    Route::put('/statuses/{status}', [StatusController::class, 'update']);
    Route::delete('/statuses/{status}', [StatusController::class, 'destroy']);

    Route::get('/tasks/{task}/comments', [CommentController::class, 'index']);
    Route::post('/tasks/{task}/comments', [CommentController::class, 'store']);
    Route::put('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
});
