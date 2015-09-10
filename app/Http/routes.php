<?php

    /*
     * */

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Route::get('home/exportExcel', 'HomeController@exportExcel');
    Route::get('home/pruebas', 'HomeController@pruebas');
    Route::post('home/estadisticas2015', 'HomeController@estadisticas2015');
    Route::post('home/excel', 'HomeController@excel');
    Route::post('home/save_user', 'HomeController@save_user');
    Route::post('home/save_photos', 'HomeController@save_photos');
    Route::post('home/verDigitaciones', 'HomeController@verDigitaciones');
    Route::post('home/delete_user', 'HomeController@delete_user');
    Route::post('home/save_cliente', 'HomeController@save_cliente');
    Route::post('home/delete_cliente', 'HomeController@delete_cliente');
    Route::post('home/estadisticas', 'HomeController@estadisticas');
    Route::match(['get', 'post'], 'home/mapa{anio}', 'HomeController@mapas');
    Route::resource('home', 'HomeController');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController'
    ]);