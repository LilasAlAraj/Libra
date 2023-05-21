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
Route::resource('sessions','App\Http\Controllers\SessionController');   // 🌷جلسات القضية
Route::get('/sessionsOfCase', 'App\Http\Controllers\CasesController@index');

Route::resource('cases', 'App\Http\Controllers\CasesController'); // 🌷القضية

Route::resource('courts', 'App\Http\Controllers\CourtController'); // 🌷المحاكم
Route::get('cases/view/{id}', 'App\Http\Controllers\CasesController@view_case');



Route::post('users/register','App\Http\Controllers\UserController@store');
Route::get('users/clients','App\Http\Controllers\UserController@clientsIndex');
Route::post('users/update_status','App\Http\Controllers\UserController@update_account_status');
Route::get('users/clients/create','App\Http\Controllers\UserController@clientsCreate');
Route::get('users/clients/{id}','App\Http\Controllers\UserController@clientIndex');
Route::get('users/members/create','App\Http\Controllers\UserController@membersCreate');
Route::get('users/members/{id}','App\Http\Controllers\UserController@memberIndex');
Route::get('users/members','App\Http\Controllers\UserController@membersIndex');
Route::get('users/{getclients}','App\Http\Controllers\UserController@show');
Route::get('users/{getmembers}','App\Http\Controllers\UserController@show');

Route::get('members','App\Http\Controllers\UserController@membersCreate');
Route::get('clients','App\Http\Controllers\UserController@clientsCreate');
Route::get('lawyers', 'App\Http\Controllers\UserController@getAllLawyers');
Route::get('clients/{name}', 'App\Http\Controllers\UserController@getAllClientWithName');


Route::get('/status_show/{id}', 'App\Http\Controllers\CasesController@show')->name('Status_show');        // حالة القضية (رابحة -خاسرة -جاري العمل عليها - مفتوحة )🌷

Route::post('/status_update/{id}', 'App\Http\Controllers\CasesController@Status_Update')->name('Status_Update');  // 🌷تغيير حالة القضية
Route::post('/updateDetails', 'App\Http\Controllers\CasesController@updateDetails')->name('updateDetails');  // 🌷تغيير حالة القضية
