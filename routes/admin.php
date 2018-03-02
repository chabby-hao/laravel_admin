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


Route::any('/test', function () {

    $a = public_path('demo/ttt.xls');

    Excel::load($a, function($reader) {
        /** @var \Maatwebsite\Excel\Readers\LaravelExcelReader $reader */
        $data = $reader->all()->toArray();
        var_dump($data);
        dd($data);exit;
    });
    exit;

    $cellData = [
        ['phone'],
        ['15921303355'],
        ['15921303357'],
        ['15921303358'],
        ['15921303359'],
    ];
    Excel::create('ttt',function($excel) use ($cellData){
        $excel->sheet('list', function($sheet) use ($cellData){
            $sheet->rows($cellData);
        });
    })->export('xls');
    exit;

    $d = Route::currentRouteAction();
    var_dump($d);
    exit;
    $a = view('admin/test');
    var_dump($a->render());
    //echo $a;
});

//放在最后
Route::any('/', 'Admin\AdminController@login')->name('login');
