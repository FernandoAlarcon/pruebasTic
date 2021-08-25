<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthControllers;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    // Route::post('login',       [AuthController::class,'login']);
    // Route::post('register',    [AuthController::class,'register']);
    // Route::post('logout',      [AuthController::class,'logout']);
    // Route::post('refresh',     [AuthController::class,'refresh']);
    // Route::get('user-profile', [AuthController::class,'userProfile'])

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('user-profile', 'App\Http\Controllers\AuthController@userProfile');
});


// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('/signup', [JwtAuthController::class, 'register']);
//     Route::post('/signin', [JwtAuthController::class, 'login']);
//     Route::get('/user', [JwtAuthController::class, 'user']);
//     Route::post('/token-refresh', [JwtAuthController::class, 'refresh']);
//     Route::post('/signout', [JwtAuthController::class, 'signout']);
// });

 