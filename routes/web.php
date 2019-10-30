<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d\-\/_.]+)?');


Route::get('/wilayah/{id}','BalaiController@balai');

Route::get('/balai/{id}', 'BalaiController@show');

Route::get('/create_paket/{id}','PaketController@create');
Route::post('/create_paket/{id}','PaketController@store');
Route::get('/paket/{id}', 'PaketController@show');
