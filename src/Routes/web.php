<?php

Route::group(['middleware' => ['web']], function () {

    Route::prefix('finder')->group(function () {
        Route::group(['as' => 'finder.'], function () {

            Route::get('home', 'HomeController@index')->name('home');

            Route::get('finder', 'FinderController@index')->name('finder');
            Route::get('finder', 'FinderController@persons')->name('persons');
            
        });
    });

});