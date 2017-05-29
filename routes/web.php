<?php

Route::get('/', function () {
    return view('index');
});
Route::get('service/getZohoData', 'ServiceController@getZohoData');
