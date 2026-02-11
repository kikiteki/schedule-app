<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // hello.blade.phpを表示する
    public function index()
    {
        return view('pages.dashboard');
    }
}
