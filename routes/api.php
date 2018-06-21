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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::post('signup','Userscontroller@signup');
// Route::post('login','Userscontroller@login');
// Route::post('forget','Userscontroller@forget');
// Route::get('password/reset/{token}', 'Userscontroller@getReset');
// Route::post('createevent', 'ApiController@createevent');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup','Api\ApiController@signup');
Route::post('login','Api\ApiController@login');
Route::post('forget','Api\ApiController@forget');
Route::get('password/reset/{token}', 'Api\ApiController@getReset');

Route::post('createevent', 'Api\ApiController@createevent');
Route::post('deleteevent', 'Api\ApiController@deleteevent');
Route::post('editevent', 'Api\ApiController@editevent');
Route::post('joinevent', 'Api\ApiController@joinevent');
Route::post('disjoinevent', 'Api\ApiController@disjoinevent');

Route::post('profile', 'Api\ApiController@profile');
Route::post('profileupdate', 'Api\ApiController@profileupdate');

