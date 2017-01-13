<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/heroes', 'HeroController@index');
Route::post('/hero/new', 'HeroController@insertOne');
Route::post('/hero/update', 'HeroController@updateOne');
Route::get('/hero/new', 'HeroController@newHeroForm');
Route::get('/hero/{id}', 'HeroController@getOne');
Route::get('/hero/{id}/delete', 'HeroController@deleteOne');
Route::get('/hero/{id}/update', 'HeroController@heroUpdate');
Route::get('/logout', 'Auth\LoginController@logout');
