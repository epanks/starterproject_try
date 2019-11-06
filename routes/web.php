<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d\-\/_.]+)?');


Route::get('/wilayah/{id}','BalaiController@balai');

Route::get('/balai/{id}', 'BalaiController@show')->name('balai.show');
Route::get('/balai/{id}/cetak_pdf', 'BalaiController@cetak_pdf');

Route::get('/paket','PaketController@index');
Route::get('/create_paket/{id}','PaketController@create');
Route::post('/create_paket/{id}','PaketController@store');
Route::get('/paket/{id}/edit', 'PaketController@edit');
Route::post('/paket/{id}/update', 'PaketController@update');
Route::get('/paket/{id}', 'PaketController@show')->name('paket.show');
Route::get('/paket/{id}/delete', 'PaketController@delete');


Route::get('/kdoutput','PaketController@kdoutput');

Route::get('/create/{id}','MasalahController@create')->name('masalah.create');
Route::post('/create/{id}','MasalahController@store');
Route::get('/masalah/{id}/edit', 'MasalahController@edit');
Route::post('/masalah/{id}/update', 'MasalahController@update');

Route::get('/masalah/{id}/delete', 'MasalahController@delete');