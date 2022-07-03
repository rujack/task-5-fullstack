<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::resources([
        'articles' => ArticleApiController::class,
        'categories' => CategoryApiController::class
    ]);
    Route::get('users', [UserApiController::class, 'index']);
    Route::post('users/login', [UserApiController::class, 'login']);
    Route::post('users/register', [UserApiController::class, 'register']);
});
