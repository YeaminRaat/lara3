<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;

class BrandController extends Controller
{
    public function index(){
        $brand = Brand::all();
        return view('admin.brand.brand', ['brands' => $brand]);
    }
    
    public function create(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_desc' => '',
            'brand_image' => 'image',
        ]);
        $imageUrl = '';
        if ($file = $request->file('brand_image')) {
            $fileName = $file->getClientOriginalName();
            $directory = 'admin/images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);
        }

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_image = $imageUrl;
        $brand->brand_status = $request->brand_status;
        $brand->save();

        /*return response()->json(['message'=>'brand Added Successfully']);*/
        return redirect()->back()->with('message', 'Brand Added Successfully');
    }

    public function update(Request $request, $id){
        $request->validate([
            'brand_name' => 'required|max:255',
            'brand_desc' => '',
            'brand_image' => 'image',
        ]);
        $brand = Brand::find($id);

        if ($file = $request->file('brand_image')) {
            $fileName = $file->getClientOriginalName();
            $directory = 'admin/images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);

            $brand->brand_image = $imageUrl;
        }

        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->save();

        /*return response()->json(['message'=>'brand Added Successfully']);*/
        return redirect()->back()->with('message', 'Brand Updated Successfully');
    }

    public function delete($id){
        $brand = Brand::find($id);
        if ($brand){
            $brand->delete();
        }
        return back()->with('message', 'Brand Deleted Successfully');
    }

    public function publish($id){
        $brand = Brand::find($id);
        $brand->brand_status = 1;
        $brand->save();
        return back()->with('message', 'Brand Status Published');
    }

    public function unpublish($id){
        $brand = Brand::find($id);
        $brand->brand_status = 0;
        $brand->save();
        return back()->with('message', 'Brand Status Unpublished');
    }
}
