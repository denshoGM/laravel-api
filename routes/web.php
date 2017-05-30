<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/getApiData', 'ServiceController@getApiData');

Route::get('/user-history', 'ServiceController@userHistory');