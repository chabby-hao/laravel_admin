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

Route::get('/phpinfo',function(){
    phpinfo();
});
//Auth::routes();
Route::get('/test', function(){

    $a = Cache::get('map:all00');
    var_dump($a);exit;

    $cookie = \Illuminate\Support\Facades\Cookie::make('test', 'hello, world');
    $a =  \Illuminate\Support\Facades\Cookie::get('test');
    var_dump($a);
    return Resp('aaa')->cookie($cookie);

//    $carbon = \Carbon\Carbon::now()->addMinutes(24 * 60);
//    dd($carbon);
//    \Illuminate\Support\Facades\Cache::store('file')->put('lalala3',8888, $carbon);
//    $b = \Illuminate\Support\Facades\Cache::store('file')->get('lalala3');
//    var_dump($b);
});

Route::get('/home', 'HomeController@index')->name('home');
