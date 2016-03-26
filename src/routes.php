<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});
