<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavmenuController extends Controller
{
    public function index()
    {
        return view('nav-menu');
    }
}
