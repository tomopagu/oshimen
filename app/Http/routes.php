<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function (Request $request) {
        if ($request->user()) {
            return redirect('user/' . $request->user()->username);
        } else {
            return view('index');
        }
    });

    Route::get('/home', function (Request $request) {
        if ($request->user()) {
            return redirect('user/' . $request->user()->username);
        } else {
            return view('index');
        }
    });

    Route::get('/user/settings', 'UserController@edit')->name('settings');
    Route::post('/user/settings', 'UserController@update');
    Route::post('/user/add-idol', 'UserController@addIdol');
    Route::get('/user/remove-idol/{id}', 'UserController@removeIdol');
    Route::get('/user/{username}', 'UserController@show')->name('profile');

    Route::get('/idol/add', 'IdolController@create')->name('createIdol');
    Route::post('/idol/add', 'IdolController@store');
});
