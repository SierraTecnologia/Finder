<?php

Route::group(['middleware' => ['web']], function () {

    Route::prefix('finder')->group(function () {
        Route::group(['as' => 'finder.'], function () {

            Route::get('home', 'HomeController@index')->name('home');

            Route::get('finder', 'FinderController@index')->name('finder');
            Route::get('persons', 'FinderController@persons')->name('persons');

            Route::prefix('track')->group(function () {
                Route::namespace('Track')->group(function () {
                    Route::group(['as' => 'track.'], function () {
                        Route::get('person', 'PersonController@index')->name('person');
                    });
                });
            });
            
        });
    });

});