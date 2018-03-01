<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
