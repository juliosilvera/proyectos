<?php

    /*
     * */

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Route::post('home/save_user', 'HomeController@save_user');
    Route::resource('home', 'HomeController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);