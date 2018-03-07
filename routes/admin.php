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


Route::any('/admins/list', 'Admin\AdminController@list');
Route::any('/admins/add', 'Admin\AdminController@add');
Route::any('/admins/login', 'Admin\AdminController@login')->name('login');
Route::any('/admins/logout', 'Admin\AdminController@logout');

//放在最后
Route::any('/', 'Admin\AdminController@login')->name('login');
