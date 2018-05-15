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
    return view('index');
});


Route::get('events', 'Event\EventController@index')->name('events');
Route::get('events/add', 'Event\EventController@add')->name('event-add');
Route::post('events/save', 'Event\EventController@save')->name('event-save');
Route::get('events/view/{event}', 'Event\EventController@view')->name('event-view');
Route::get('events/edit/{event}', 'Event\EventController@edit')->name('event-edit');

Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses'=>'Auth\LoginController@logout']);

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
