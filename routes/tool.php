<?php

/*
|--------------------------------------------------------------------------
| Tool Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middlewareGroup('tool',[]);

Route::get('/',function(){
    echo 5;exit;
});

Route::any('xinpu/detect','Tool\XinpuController@detect');
Route::any('xinpu/result','Tool\XinpuController@result');

Route::any('command/refreshGsm','Tool\CommandController@refreshGsm');
Route::any('command/bt2503','Tool\CommandController@bt2503');
Route::any('command/tongbushefang','Tool\CommandController@tongbushefang');
Route::any('command/zhendongfenji','Tool\CommandController@zhendongfenji');
Route::any('command/activeConfig','Tool\CommandController@activeConfig');
Route::any('command/szfjGear','Tool\CommandController@szfjGear');
Route::any('command/command','Tool\CommandController@command');


Route::get('/phpinfo',function(){
    phpinfo();
});
