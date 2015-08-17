<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PropertyController@index');
Route::get('announcement/create', 'PropertyController@create');
Route::post('announcement/store', 'PropertyController@store');
Route::get('announcement/sort', 'PropertyController@sort');
Route::get('announcement', 'PropertyController@index');
Route::get('announcement/search', 'PropertyController@search');
Route::get('announcement/{id}', 'PropertyController@show');

Route::get('user/announcements', 'UserController@showAnnouncements');
Route::get('user', 'UserController@index');
Route::patch('user', 'UserController@update');


Route::get('guestbook', function () {
    return view('guestbook');
});

Route::get('api/messages', function () {
    return App\Message::all();
});
Route::post('api/messages', function () {
    return App\Message::create(Request::all());
});

Route::get('test', function () {
    return view('angular');
});
Route::get('test/get', function () {
    return App\Property::all();
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


/*  
Route::get('/', function () {
    return view('app');
});
*/