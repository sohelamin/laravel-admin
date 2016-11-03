<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
    Route::get('generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => 'Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});
