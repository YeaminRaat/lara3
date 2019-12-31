<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Product;
use App\Model\Category;
use App\Model\Brand;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product = Product::all();
        $product = DB::table('products')
            ->join('categories','products.cat_id', '=', 'categories.id')
            ->join('brands','products.brand_id', '=', 'brands.id')
            ->join('users','products.uploaded_by', '=', 'users.id')
            ->select('products.*','categories.cat_name','brands.brand_name','users.name')
            ->get();

            //dd($product);
        $category = Category::where('cat_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();

        return view('admin.product.product',[
            'product'=>$product,
            'category'=>$category,
            'brand'=>$brand,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $imageUrl = '';
        if ($file = $request->file('product_image')) {
            $fileName = date("YmdHis")."_".$file->getClientOriginalName();
            $directory = 'admin/images/product_images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);
            $product->image = $imageUrl;
        }
        if ($request->file('gallery_image')) {
            foreach ($request->file('gallery_image') as $image) {
                $fileName = $image->getClientOriginalName();
                $directory = 'admin/images/product_images/';
                $g_imageUrl = $directory.$fileName;
                $image->move($directory, $fileName);
                $data[] = $g_imageUrl;
            }
            $product->gallery_image = json_encode($data);
        }
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->discount_price = $request->discount_price;
        $product->product_price = $request->product_price;
        $product->quantity = $request->quantity;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->uploaded_by = Auth::user()->id;

        $product->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $imageUrl = '';
        if ($file = $request->file('product_image')) {
            $fileName = date("YmdHis")."_".$file->getClientOriginalName();
            $directory = 'admin/images/product_images/';
            $imageUrl = $directory.$fileName;
            $file->move($directory, $fileName);
            $product->image = $imageUrl;
        }
        if ($request->file('gallery_image')) {
            foreach ($request->file('gallery_image') as $image) {
                $fileName = $image->getClientOriginalName();
                $directory = 'admin/images/product_images/';
                $g_imageUrl = $directory.$fileName;
                $image->move($directory, $fileName);
                $data[] = $g_imageUrl;
            }
            $product->gallery_image = json_encode($data);
        }
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->discount_price = $request->discount_price;
        $product->product_price = $request->product_price;
        $product->quantity = $request->quantity;
        $product->size = $request->size;
        $product->status = $request->status;
        
        $product->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return back();
    }
}
