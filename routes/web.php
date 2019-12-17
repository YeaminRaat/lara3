<?php

Route::get('/','MainController@index')->name('homepage');
Route::get('/all-category','MainController@getCategories');
Route::get('/all-brand','MainController@getBrands');
Route::get('/featured-product','MainController@getFeaturedProducts');
Route::get('/new-product','MainController@getNewProducts');
Route::get('/category/{id}','MainController@getCatProducts');
Route::get('/product-details/{id}','MainController@getProductDetails');

Route::post('/add-cart','CartController@addToCart');
Route::post('/delete-cart','CartController@deleteCart');
Route::post('/update-cart','CartController@updateCart');
Route::get('/all-cart','CartController@allCart');
//Route::get('/count-cart','CartController@countCart');

Route::post('user-register','CustomerController@register');
Route::post('user-login','CustomerController@login');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','namespace'=>'Backend', 'middleware'=>'auth'], function (){
    //category
    Route::get('/category','CategoryController@index')->name('admin.category');
    Route::get('/category/getTableData','CategoryController@get')->name('admin.category.getTableData');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('admin.category.getEditData');
    Route::post('/category/inlineedit','CategoryController@inlineEdit')->name('admin.category.inlineEdit');
    Route::post('/category','CategoryController@create');
    Route::post('/category/update','CategoryController@update')->name('admin.category.update');
    Route::get('/category/delete/{id}','CategoryController@delete')->name('admin.category.delete');
    Route::get('/category/publish/{id}','CategoryController@publish')->name('category.publish');
    Route::get('/category/unpublish/{id}','CategoryController@unpublish')->name('category.unpublish');

    //brand
    Route::get('/brand','BrandController@index')->name('admin.brand');
    Route::post('/brand','BrandController@create');
    Route::post('/brand/update/{id}','BrandController@update')->name('admin.brand.update');
    Route::get('/brand/delete/{id}','BrandController@delete')->name('admin.brand.delete');
    Route::get('/brand/publish/{id}','BrandController@publish')->name('brand.publish');
    Route::get('/brand/unpublish/{id}','BrandController@unpublish')->name('brand.unpublish');

    //product
    Route::resource('product', 'ProductController');


});


Route::get('{path}','MainController@index')->where( 'path', '.*' );









