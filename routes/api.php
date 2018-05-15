<?php

use Illuminate\Http\Request;

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


// Route::group(['namespace'=>'api'],function(){

	Route::post('signup','Userscontroller@signup');
	Route::post('login','Userscontroller@login');
	Route::post('forget','Userscontroller@forget');
	Route::get('password/reset/{token}', 'Userscontroller@getReset');

	


// });