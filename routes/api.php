<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\AuthController;
use App\Http\Controllers\Apis\UserController;
use App\Http\Controllers\Apis\FeedbackController;
use App\Http\Controllers\Apis\DeveloperController;
use App\Http\Controllers\Apis\AstrologerController;
use App\Http\Controllers\Apis\AdministratorController;
use App\Http\Controllers\Apis\AstrologerToolController;
use App\Http\Controllers\Apis\UserActivityLogController;
use App\Http\Controllers\Apis\AppointmentAnswerController;
use App\Http\Controllers\Apis\AppointmentQuestionController;
use App\Http\Controllers\Apis\AstrologicalToolController;
use App\Http\Controllers\Apis\DeveloperActivityLogController;
use App\Http\Controllers\Apis\AstrologerActivityLogController;
use App\Http\Controllers\Apis\AdministratorActivityLogController;
use App\Http\Controllers\Apis\UserFinancialTransactionController;
use App\Http\Controllers\Apis\DeveloperFinancialTransactionController;
use App\Http\Controllers\Apis\AstrologerFinancialTransactionController;
use App\Http\Controllers\Apis\AdministratorFinancialTransactionController;

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

Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::post('logout', [AuthController::class,'logout']);

Route::group([

    'middleware' => 'auth:api',

], function () {

Route::get('/me',[AuthController::class,'me']);

Route::apiResource('/users',UserController::class);

Route::apiResource('/astrologers',AstrologerController::class);

Route::apiResource('/developers',DeveloperController::class);

Route::apiResource('/administrators',AdministratorController::class);

Route::apiResource('/ufts',UserFinancialTransactionController::class);

Route::apiResource('/afts',AstrologerFinancialTransactionController::class);

Route::apiResource('/dfts',DeveloperFinancialTransactionController::class);

Route::apiResource('/adfts',AdministratorFinancialTransactionController::class);

Route::apiResource('/uals',UserActivityLogController::class);

Route::apiResource('/aals',AstrologerActivityLogController::class);

Route::apiResource('/dals',DeveloperActivityLogController::class);

Route::apiResource('/adals',AdministratorActivityLogController::class);

Route::apiResource('/appointment-questions',AppointmentQuestionController::class);

Route::apiResource('/appointment-answers',AppointmentAnswerController::class);

Route::apiResource('/feedback',FeedbackController::class);
Route::apiResource('/astrological_tools',AstrologicalToolController::class);

Route::apiResource('/astrologer_tools',AstrologerToolController::class);
});
