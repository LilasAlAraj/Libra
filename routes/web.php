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


//decisions
Route::post('decision','App\Http\Controllers\DecisionController@store');
Route::get('decision/{id}','App\Http\Controllers\DecisionController@show');
Route::put('decision/update','App\Http\Controllers\DecisionController@update');
Route::delete('decision/','App\Http\Controllers\DecisionController@destroy');


//attachments of session
Route::post('session/attachment','App\Http\Controllers\SessionAttachmentController@store');

//sessions
Route::post('session','App\Http\Controllers\SessionController@store');
Route::get('session/{id}','App\Http\Controllers\SessionController@show');
Route::put('session/update','App\Http\Controllers\SessionController@update');
Route::delete('session/','App\Http\Controllers\SessionController@destroy');





// archive
Route::get('cases/archive','App\Http\Controllers\CaseArchiveController@index');
Route::get('cases/archive/all','App\Http\Controllers\CaseArchiveController@showAll');
Route::delete('cases/archive','App\Http\Controllers\CaseArchiveController@destroy');
Route::post('cases/archive/restore','App\Http\Controllers\CaseArchiveController@restore');



//account setting
Route::get('account/setting','App\Http\Controllers\SettingAccountController@index');
Route::post('account/change_password','App\Http\Controllers\SettingAccountController@update');
Route::get('account','App\Http\Controllers\SettingAccountController@show');




Route::resource('cases', 'App\Http\Controllers\CasesController'); // 🌷القضية

Route::resource('courts', 'App\Http\Controllers\CourtController'); // 🌷المحاكم
Route::get('cases/view/{id}', 'App\Http\Controllers\CasesController@view_case');


//clients and members

Route::post('users/register','App\Http\Controllers\UserController@store');
Route::post('users/update','App\Http\Controllers\UserController@update');
Route::get('users/client/{id}/edit/','App\Http\Controllers\UserController@editClient');
Route::get('users/member/{id}/edit','App\Http\Controllers\UserController@editMember');
Route::get('users/clients','App\Http\Controllers\UserController@clientsIndex');
Route::post('users/update_status','App\Http\Controllers\UserController@update_account_status');
Route::get('users/clients/create','App\Http\Controllers\UserController@clientsCreate');
Route::get('users/clients/{id}','App\Http\Controllers\UserController@clientIndex');
Route::get('users/members/create','App\Http\Controllers\UserController@membersCreate');
Route::get('users/members/{id}','App\Http\Controllers\UserController@memberIndex');
Route::get('users/members','App\Http\Controllers\UserController@membersIndex');
Route::get('users/{getclients}','App\Http\Controllers\UserController@show');
Route::get('users/{getmembers}','App\Http\Controllers\UserController@show');
Route::delete('users/{id}','App\Http\Controllers\UserController@destroy');
Route::get('members','App\Http\Controllers\UserController@membersCreate');
Route::get('clients','App\Http\Controllers\UserController@clientsCreate');
Route::get('lawyers', 'App\Http\Controllers\UserController@getAllLawyers');
Route::get('clients/{name}', 'App\Http\Controllers\UserController@getAllClientWithName');





Route::get('/status_show/{id}', 'App\Http\Controllers\CasesController@show')->name('Status_show');        // حالة القضية (رابحة -خاسرة -جاري العمل عليها - مفتوحة )🌷

Route::post('/status_update/{id}', 'App\Http\Controllers\CasesController@Status_Update')->name('Status_Update');  // 🌷تغيير حالة القضية
Route::post('/updateDetails', 'App\Http\Controllers\CasesController@updateDetails')->name('updateDetails');  // 🌷تغيير حالة القضية
