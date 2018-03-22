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
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\VerifyCsrfToken::class,
    \App\Http\Middleware\AdminBeforeCheck::class,
]);

Route::any('/index/welcome', 'Admin\IndexController@welcome')->name('admin-home');

Route::any('/auth/login','Admin\AuthController@login')->name('admin-login');
Route::any('/auth/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
    return \Illuminate\Support\Facades\Redirect::route('admin-login');
})->name('admin-logout');

Route::any('/user/list', 'Admin\UserController@list');
Route::any('/user/add', 'Admin\UserController@add');
Route::any('/user/edit', 'Admin\UserController@edit');
Route::any('/user/attachRole', 'Admin\UserController@attachRole');
Route::any('/user/delete', 'Admin\UserController@delete');

Route::any('/role/list','Admin\RoleController@list');
Route::any('/role/add','Admin\RoleController@add');
Route::any('/role/edit','Admin\RoleController@edit');
Route::any('/role/attachPermis','Admin\RoleController@attachPermis');
Route::any('/role/delete','Admin\RoleController@delete');

Route::any('/permis/list','Admin\PermisController@list');
Route::any('/permis/add','Admin\PermisController@add');
Route::any('/permis/edit','Admin\PermisController@edit');

Route::any('/device/list','Admin\DeviceController@list');


//放在最后
Route::any('/', 'Admin\IndexController@welcome');