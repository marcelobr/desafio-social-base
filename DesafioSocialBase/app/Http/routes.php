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

Route::group(['prefix' => 'api'], function ()
{
    Route::group(['prefix' => 'message'], function ()
    {
        Route::get('', ['uses' => 'MessageController@allMessages']);

        Route::get('user/{id}', ['uses' => 'MessageController@messagesByUser']);

        Route::post('publish', ['uses' => 'MessageController@publishMessage']);
    });

    Route::group(['prefix' => 'user'], function ()
    {
        Route::get('', ['uses' => 'UserController@allUsers']);

        Route::post('create', ['uses' => 'UserController@newUser']);
    });
});

Route::get('/', function () {
    return view('welcome');
});
