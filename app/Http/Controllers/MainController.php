<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('front-end.home.home');
    }

    public function categoryPage(){
        return view('front-end.category.category');
    }
}
