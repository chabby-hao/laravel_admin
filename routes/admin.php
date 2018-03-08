<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middlewareGroup('admin', [
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\AdminBeforeCheck::class,
]);

Route::any('/index/welcome', 'Admin\IndexController@welcome');

Route::any('/user/list', 'Admin\UserController@list');
Route::any('/user/add', 'Admin\UserController@add');

//放在最后
Route::any('/', 'Admin\AuthController@login');
