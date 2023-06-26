<?php

use App\Http\Controllers\adminControllers\adminController;
use App\Http\Controllers\phoneBaseControllers\createController;
use App\Http\Controllers\phoneBaseControllers\destroyController;
use App\Http\Controllers\phoneBaseControllers\editController;
use App\Http\Controllers\phoneBaseControllers\indexController;
use App\Http\Controllers\phoneBaseControllers\showController;
use App\Http\Controllers\phoneBaseControllers\storeController;
use App\Http\Controllers\phoneBaseControllers\updateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::group(['namespace'=>'phoneBaseControllers', 'middleware'=>'jwt.auth'], function () {
    Route::get('/home', [indexController::class, 'index']);
    Route::get('/phones/create', [createController::class, 'create']);
    Route::post('/phones', [storeController::class, 'store']);
    Route::get('/phones/{phone}', [showController::class, 'show']);
    Route::get('/phones/{phone}/edit', [editController::class, 'edit']);
    Route::patch('/phones/{phone}', [updateController::class, 'update']);
    Route::delete('/phones/{phone}', [destroyController::class, 'destroy']);
});

Route::group(['namespace'=>'adminControllers', 'middleware'=>'jwt.auth'], function () {
    Route::get('/admin', [adminController::class, '__invoke']);
});
