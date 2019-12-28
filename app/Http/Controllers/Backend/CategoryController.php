<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(){
        $category = Category::orderby('id', 'DESC')->get();
        return view('admin.category.category', ['categories' => $category]);
    }
    public function get(){
        $d['categories'] = Category::orderby('id', 'DESC')->get();
        return view('admin.category.getTableData', $d);
    }

    public function create(Request $request){
        $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
            'cat_desc' => '',
            'cat_image' => 'image',
        ]);
        $imageUrl = '';
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

        echo "done";
        //return response()->json($category);
        //return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request){
        $request->validate([
            'cat_name' => 'required|max:255',
            'cat_desc' => '',
            'cat_image' => 'image',
        ]);
        $category = Category::find($request->id);
        
        if ($file = $request->file('cat_image')) {
            $fileName = $file->getClientOriginalName();
            $directory = 'admin/images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);

            $category->cat_image = $imageUrl;
        }

        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->save();

        echo "done";
        /*return response()->json(['message'=>'Category Added Successfully']);*/
        //return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    public function inlineEdit(Request $request){
        $category = Category::find($request->id);
        if ($request->column_name == "cat_name") {
            $category->cat_name = $request->text;
        }
        elseif ($request->column_name == "cat_desc") {
            $category->cat_desc = $request->text;
        }
        $category->save();
        
        echo "done";
    }

    public function delete($id){
        $category = Category::find($id);
        if ($category){
            $category->delete();
        }
        echo "done";
        //return back()->with('message', 'Category Deleted Successfully');
    }

    public function publish($id){
        $category = Category::find($id);
        $category->cat_status = 1;
        $category->save();

        echo "done";
        //return back()->with('message', 'Category Status Published');
    }

    public function unpublish($id){
        $category = Category::find($id);
        $category->cat_status = 0;
        $category->save();

        echo "done";
        //return back()->with('message', 'Category Status Unpublished');
    }
}
