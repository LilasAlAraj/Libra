<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CaseController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\CaseResource;
use App\Http\Controllers\Api\DecisionController;
use App\Http\Controllers\Api\SendAttachmentController;
use App\Http\Controllers\Api\CaseAttachmentController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\TaskController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']); 
    Route::post('/change-password', [AuthController::class ,'changePassword']);    
});


Route::middleware(['jwt.verify'])->group(function(){

    Route::get('/cases',[CaseController::class, 'index']);//عرض جميع القضايا
    Route::get('/case/{caseID}',[CaseController::class ,'show']);//تفاصيل القضية
    Route::get('/user_cases',[UserController::class ,'getUserCases']);//عرض قضايا المستخدم حسب دوره
    Route::get('/case/{caseID}/decisions',[DecisionController::class,'CaseDecision']);//قرارات القضية
    Route::get('/case/{caseID}/attachments',[CaseAttachmentController::class,'CaseAttashments']);//مرفقات الفضية
    Route::get('/case/{caseID}/sessions',[SessionController::class ,'CaseSessions']);//جلسات القضية
    Route::post('/send_attachment',[SendAttachmentController::class ,'store']);//ارسال مرفق
    Route::get('/user_tasks',[TaskController::class ,'getUserTasks']);//مهام المحامي
});