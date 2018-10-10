<?php

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

$middleware = [
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\VerifyCsrfToken::class,
    \App\Http\Middleware\AdminBeforeCheck::class,
];
if(env('APP_ENV') === 'production'){
    //$middleware[] = \App\Http\Middleware\VerifyCsrfToken::class;
}

Route::middlewareGroup('admin', $middleware);

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
Route::any('/user/resetPassword', 'Admin\UserController@resetPassword');

Route::any('/role/list','Admin\RoleController@list');
Route::any('/role/add','Admin\RoleController@add');
Route::any('/role/edit','Admin\RoleController@edit');
Route::any('/role/attachPermis','Admin\RoleController@attachPermis');
Route::any('/role/delete','Admin\RoleController@delete');

Route::any('/permis/list','Admin\PermisController@list');
Route::any('/permis/add','Admin\PermisController@add');
Route::any('/permis/edit','Admin\PermisController@edit');

Route::any('/device/list','Admin\DeviceController@list');
Route::any('/device/detail','Admin\DeviceController@detail');
Route::any('/device/locationList','Admin\DeviceController@locationList');
Route::any('/device/lockLogList','Admin\DeviceController@lockLogList');
Route::any('/device/historyState','Admin\DeviceController@historyState');
Route::any('/device/mileageList','Admin\DeviceController@mileageList');
Route::any('/device/importCity','Admin\DeviceController@importCity');
Route::any('/device/searchCity','Admin\DeviceController@searchCity');
Route::any('/device/exportList','Admin\DeviceController@exportList');
Route::any('/device/map','Admin\DeviceController@map');
Route::any('/device/tripTrails','Admin\DeviceController@tripTrails');
Route::any('/device/romStatList','Admin\DeviceController@romStatList');
Route::any('/device/stat','Admin\DeviceController@stat');
Route::any('/device/cardList','Admin\DeviceController@cardList');
Route::any('/device/cardDailyList','Admin\DeviceController@cardDailyList');
Route::any('/device/historyStrength','Admin\DeviceController@historyStrength');
Route::any('/device/historyZhangfei','Admin\DeviceController@historyZhangfei');
Route::any('/device/types','Admin\DeviceController@types');
Route::any('/device/typesedit','Admin\DeviceController@typesedit');
Route::any('/device/typesadd','Admin\DeviceController@typesadd');
Route::any('/device/four','Admin\DeviceController@four');

//消息
Route::any('/message/list','Admin\MessageController@list');


//订单
Route::any('/order/list','Admin\OrderController@list');
Route::any('/order/add','Admin\OrderController@add');
Route::any('/order/edit','Admin\OrderController@edit');
Route::any('/order/delete','Admin\OrderController@delete');
Route::any('/order/detail','Admin\OrderController@detail');

//出货单
Route::any('/delivery/list','Admin\DeliveryController@list');
Route::any('/delivery/add','Admin\DeliveryController@add');
Route::any('/delivery/edit','Admin\DeliveryController@edit');
Route::any('/delivery/delete','Admin\DeliveryController@delete');
Route::any('/delivery/factoryPanel','Admin\DeliveryController@factoryPanel');
Route::any('/delivery/shipmentProcess','Admin\DeliveryController@shipmentProcess');
Route::any('/delivery/listDevice','Admin\DeliveryController@listDevice');

Route::any('/map/show','Admin\MapController@show');

Route::any('/brand/detail','Admin\BrandController@detail');
Route::any('/brand/list','Admin\BrandController@list');
Route::any('/brand/add','Admin\BrandController@add');
Route::any('/brand/edit','Admin\BrandController@edit');

Route::any('/ebike/list','Admin\EbikeController@list');
Route::any('/ebike/add','Admin\EbikeController@add');
Route::any('/ebike/edit','Admin\EbikeController@edit');

Route::any('/channel/detail','Admin\ChannelController@detail');
Route::any('/channel/list','Admin\ChannelController@list');
Route::any('/channel/add','Admin\ChannelController@add');
Route::any('/channel/channelSn','Admin\ChannelController@channelSn');
Route::any('/channel/update','Admin\ChannelController@update');

Route::any('/customer/detail','Admin\CustomerController@detail');


Route::any('/tool/file','Admin\ToolController@file');
Route::any('/tool/fileAdd','Admin\ToolController@fileAdd');
Route::any('/tool/fileDelete','Admin\ToolController@fileDelete');
Route::any('/tool/romUpdate','Admin\ToolController@romUpdate');
Route::any('/tool/getFileUrl','Admin\ToolController@getFileUrl');
Route::any('/tool/exportByImsi','Admin\ToolController@exportByImsi');
Route::any('/tool/imsiRepeat','Admin\ToolController@imsiRepeat');
Route::any('/tool/deviceToChannel','Admin\ToolController@deviceToChannel');
Route::any('/tool/cmdSend','Admin\ToolController@cmdSend');
Route::any('/tool/userDeviceDel','Admin\ToolController@userDeviceDel');
Route::any('/tool/userDeviceAdd','Admin\ToolController@userDeviceAdd');
Route::any('/tool/deviceExpireModify','Admin\ToolController@deviceExpireModify');
Route::any('/tool/lock','Admin\ToolController@lock');


Route::get('/breakRule/list','Admin\BreakRuleController@list');

Route::any('/api/channelKeyList','Admin\ApiController@channelKeyList');
Route::any('/api/channelKeyAdd','Admin\ApiController@channelKeyAdd');
Route::any('/api/refreshChannelConfig','Admin\ApiController@refreshChannelConfig');


Route::any('/detect/factoryTestList','Admin\DetectController@factoryTestList');

Route::any('/battery/stat', 'Admin\BatteryController@stat');

//客户
Route::any('/customer/list','Admin\CustomerController@list');
Route::any('/customer/add','Admin\CustomerController@add');
Route::any('/customer/edit','Admin\CustomerController@edit');

//场景
Route::any('/scenes/list','Admin\ScenesController@list');
Route::any('/scenes/add','Admin\ScenesController@add');
Route::any('/scenes/edit','Admin\ScenesController@edit');

//放在最后
Route::any('/', 'Admin\IndexController@welcome');