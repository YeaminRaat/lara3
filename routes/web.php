<?php

Route::get('/','MainController@index')->name('homepage');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Backend', 'middleware'=>'auth'], function (){

    Route::get('/category','CategoryController@index')->name('admin.category');
    Route::post('/category','CategoryController@create');

});












