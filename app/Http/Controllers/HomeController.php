<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $a = DB::select("select * from users");
        var_dump($a);exit;

        return view('index');
    }
}
