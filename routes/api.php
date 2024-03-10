<?php

use App\Http\Controllers\api\V1\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'v1/'], function() {
    
    Route::apiResource('comment', CommentController::class);
    Route::get('test/comment/', [CommentController::class, 'demo']);
    // Route::get('test/comment/{commentId}', [CommentController::class, 'demo']);
    
});