<?php

Route::get('/data/show/all','DataController@data_show');
Route::get('/data/show/individual/{id}','DataController@data_show_individual');

Route::post('/data/insert','DataController@data_insert');

Route::patch('data/update/{id}','DataController@data_update');

Route::delete('data/delete/{id}','DataController@data_delete');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload','AuthController@payload');
    Route::post('register','AuthController@register');

});