<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//API
Route::get('/api/events/json', 'EventController@index_json');
Route::get('/api/events/{id}/json', 'EventController@show_json');

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/markallasread', 'UserController@markallasread')->middleware('auth');

Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::get('/member/{id}', 'UserController@profile_member')->middleware('auth');
Route::get('/profile/edit', 'UserController@profile_edit')->middleware('auth');
Route::post('/profile/edit', 'UserController@profile_update')->middleware('auth');
Route::get('/requests', 'UserController@requests')->middleware('auth');
Route::get('/invites', 'UserController@invites')->middleware('auth');


Route::get('/events', 'EventController@index')->middleware('auth');
Route::get('/my-events', 'EventController@myindex')->middleware('auth');
Route::get('/attending', 'EventController@attending')->middleware('auth');
Route::get('/pending', 'EventController@pending')->middleware('auth');

Route::post('/events/{id}/message/send', 'EventController@store_message')->middleware('auth');

///x App Request
Route::get('api/events/index', 'EventController@appIndex');
Route::get('events/appstore', 'EventController@appStore');
Route::get('events/appdestroy/{id}', 'EventController@appDestroy');
Route::get('events/appupdate/', 'EventController@appUpdate');

Route::get('/events/new', 'EventController@create')->middleware('auth');
Route::post('/events/new', 'EventController@store')->middleware('auth');
Route::get('/events/{id}', 'EventController@show')->middleware('auth');
Route::get('/events/{id}/edit', 'EventController@edit')->middleware('auth');
Route::post('/events/{id}/edit', 'EventController@update')->middleware('auth');
Route::get('/events/{id}/invite', 'EventController@invite')->middleware('auth');
Route::get('/events/{id}/invite/{member_id}', 'EventController@invite_member')->middleware('auth');
Route::get('/events/{id}/join', 'EventController@join')->middleware('auth');
Route::get('/events/{id}/member/{member_id}/accept', 'EventController@accept')->middleware('auth');
Route::get('/events/{id}/member/{member_id}/reject', 'EventController@reject')->middleware('auth');
