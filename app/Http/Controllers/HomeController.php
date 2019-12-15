<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category_count = Category::all()->count();
        $brand_count = Brand::all()->count();
        return view('admin.home.home', ['c_count'=>$category_count, 'b_count'=>$brand_count]);
    }
}
