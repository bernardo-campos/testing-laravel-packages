<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/books', [BookController::class, 'index'])->name('books.index');

JsonApiRoute::server('v1')->prefix('v1')->resources(function ($server) {
    $server->resource('authors', JsonApiController::class)->readOnly();
});