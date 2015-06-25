<?php

    /*
     * */

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Route::post('home/save_user', 'HomeController@save_user');
    Route::post('home/save_cliente', 'HomeController@save_cliente');
    Route::post('home/delete_cliente', 'HomeController@delete_cliente');
    Route::resource('home', 'HomeController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);