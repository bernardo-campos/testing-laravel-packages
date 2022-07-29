<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// restablecer la contraseña (ingresa mail para enviar token)
// Route::get('/email', function () { return view('adminlte::auth.passwords.email'); });

// pide nuevamente contraseña (requiere estar logueado)
// Route::get('/confirm', function () { return view('adminlte::auth.passwords.confirm'); });

// token - establcer nueva contraseña
// Route::get('/reset', function () { return view('adminlte::auth.passwords.reset')->with('token', 'asd'); });

Route::mailPreview();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('adminlte::page');
    });

    Route::group([
        'as'            => 'authors.',
        'prefix'        => 'authors',
        'controller'    => AuthorController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        // Route::get('/{author}', 'show')->name('show');
        Route::get('/{author}/edit', 'edit')->name('edit');
        Route::put('/{author}', 'update')->name('update');
        // Route::delete('{author}', 'destroy')->name('destroy');
    });

    Route::group([
        'as'            => 'books.',
        'prefix'        => 'books',
        'controller'    => BookController::class,
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        // Route::get('/{book}', 'show')->name('show');
        Route::get('/{book}/edit', 'edit')->name('edit');
        Route::put('/{book}', 'update')->name('update');
        Route::delete('{book}', 'destroy')->name('destroy');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');

    });

});
