<?php

// Admin routes  for material
Route::group(['prefix' => 'admin/fabrication'], function () {
    Route::resource('material', 'MaterialAdminController');
});

// User routes for material
Route::group(['prefix' => 'user/fabrication'], function () {
    Route::resource('material', 'MaterialUserController');
});

// Public routes for material
Route::group(['prefix' => 'fabrications'], function () {
    Route::get('/', 'MaterialPublicController@index');
    Route::get('/{slug?}', 'MaterialPublicController@show');
});


// Admin routes  for product
Route::group(['prefix' => 'admin/fabrication'], function () {
    Route::resource('product', 'ProductAdminController');
});

// User routes for product
Route::group(['prefix' => 'user/fabrication'], function () {
    Route::resource('product', 'ProductUserController');
});

// Public routes for product
Route::group(['prefix' => 'fabrications'], function () {
    Route::get('/', 'ProductPublicController@index');
    Route::get('/{slug?}', 'ProductPublicController@show');
});

