<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/delete', [
        'as' => 'getdelete', function () {
            return view('delete');
        }]);
    Route::get('/update', [
        'as' => 'getupdate', function () {
            return view('update');
        }]);

    Route::get('/', [
        'uses' => 'DeviceController@getDevices',
        'as' => 'table'
    ]);

    Route::post('/create', [
        'uses' => 'DeviceController@postCreate',
        'as' => 'create'
    ]);

    Route::post('/delete', [
        'uses' => 'DeviceController@postDelete',
        'as' => 'delete'
    ]);

    Route::post('/update', [
        'uses' => 'DeviceController@postUpdate',
        'as' => 'update'
    ]);
});

