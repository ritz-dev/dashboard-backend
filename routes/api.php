<?php

use App\Http\Controllers\Apis\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Apis\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\AuthController;

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

Route::post('login', [AuthController::class,'login']);
Route::post('logout', [AuthController::class,'logout']);

Route::group([
    'middle' => ['auth.admin']
], function () {

    Route::get('/me',[AuthController::class,'me']);

    Route::resource('/roles',RoleController::class);

    Route::resource('/users',AdminController::class);

});
