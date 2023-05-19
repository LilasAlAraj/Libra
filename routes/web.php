<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cases', 'App\Http\Controllers\CasesController'); // 🌷القضية

Route::resource('courts', 'App\Http\Controllers\CourtController'); // 🌷المحاكم
Route::get('cases/view/{id}', 'App\Http\Controllers\CasesController@view_case');

Route::get('lawyers', 'App\Http\Controllers\UserController@getAllLawyers');
Route::get('clients/{name}', 'App\Http\Controllers\UserController@getAllClientWithName');


Route::get('/status_show/{id}', 'App\Http\Controllers\CasesController@show')->name('Status_show');        // حالة القضية (رابحة -خاسرة -جاري العمل عليها - مفتوحة )🌷

Route::post('/status_update/{id}', 'App\Http\Controllers\CasesController@Status_Update')->name('Status_Update');  // 🌷تغيير حالة القضية
