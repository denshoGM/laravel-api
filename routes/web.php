<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/getCombined', 'ServiceController@getCombinedData');
Route::post('/saveCombined', 'ServiceController@storeCombined');

Route::get('/getUsersData', 'ServiceController@getUsersData');

Route::get('/getTodosData', 'ServiceController@getTodosData');

Route::get('/user-history', 'ServiceController@getHistory');

Route::get('/delete-history/{id}/{user_id}', 'ServiceController@destroyHistory');