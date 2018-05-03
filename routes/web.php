<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/','Bi\HomeController@index');
Route::get('/stat/requestCount','Bi\StatController@requestCount');

/*Route::get('/phpinfo',function(){
    phpinfo();
});*/

Route::get('/test', function(){
});

Route::get('/home', 'HomeController@index')->name('home');
