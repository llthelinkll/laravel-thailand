<?php

Route::middleware('api')->group(function () {
    Route::prefix('sub-district')->name('sub-district.')->group(function () {
        Route::get('all', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getAllSubDistricts')->name('all');
        Route::get('{id}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getSubDistrict')->name('get');
        Route::get('search/{query}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@searchSubDistrict')->name('search');
    });
    Route::prefix('district')->name('district.')->group(function () {
        Route::get('all', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getAllDistricts')->name('all');
        Route::get('{id}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getDistrict')->name('get');
        Route::get('search/{query}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@searchDistrict')->name('search');
    });
    Route::prefix('province')->name('province.')->group(function () {
        Route::get('all', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getAllProvinces')->name('all');
        Route::get('{id}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getProvince')->name('get');
        Route::get('search/{query}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@searchProvince')->name('search');
    });
    Route::prefix('postal-code')->name('postal-code.')->group(function () {
        Route::get('all', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getAllPostalCodes')->name('all');
        Route::get('{id}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@getPostalCode')->name('get');
        Route::get('search/{query}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@searchPostalCode')->name('search');
    });
    Route::prefix('search')->name('search.')->group(function () {
        Route::get('address/{query}', 'TheLink\ThaiAddress\Controllers\ThaiAddressController@search')->name('address');
    });
});
