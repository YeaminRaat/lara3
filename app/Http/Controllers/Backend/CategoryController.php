<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.category', ['categories' => $category]);
    }

    public function create(Request $request){
        $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
            'body' => 'required',
        ]);

        $imageUrl = "";
        if ($file = $request->file('cat_image')) {
            $fileName = $file->getClientOriginalName();
            $directory = 'admin/images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);
        }
        
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->cat_image = $imageUrl;
        $category->cat_status = $request->cat_status;
        $category->save();


        /*return response()->json(['message'=>'Category Added Successfully']);*/
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
}
