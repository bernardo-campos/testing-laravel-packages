<?php

use Illuminate\Support\Facades\Route;

// restablecer la contraseña (ingresa mail para enviar token)
// Route::get('/email', function () { return view('adminlte::auth.passwords.email'); });

// pide nuevamente contraseña (requiere estar logueado)
// Route::get('/confirm', function () { return view('adminlte::auth.passwords.confirm'); });

// token - establcer nueva contraseña
// Route::get('/reset', function () { return view('adminlte::auth.passwords.reset')->with('token', 'asd'); });

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('adminlte::page');
    });

});
