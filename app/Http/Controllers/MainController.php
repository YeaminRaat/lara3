<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Brand;
use App\Model\Comment;
use DB;

class MainController extends Controller
{
    public function index(){
        return view('public.master');
    }

    public function getCategories(){
    	$categories = Category::where('cat_status', 1)->get();
        return response()->json($categories);
    }

    public function getBrands(){
        $brands = Brand::where('brand_status', 1)->get();
        return response()->json($brands);
    }

    public function getFeaturedProducts(){
    	$featuredProduct = Product::where('status',1)
    					->limit(3)
    					->get();

    	//return $featuredProduct;
    	return response()->json($featuredProduct);
    }

    public function getNewProducts(){
    	$newProduct = Product::where('status', 1)
    				->orderBy('id', 'desc')
    				->limit(8)
    				->get();
    	//return $featuredProduct;
    	return response()->json($newProduct);
    }

    public function getCatProducts($id){
        $catProduct = Product::where('cat_id', $id)
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
        //return $catProduct;
        return response()->json($catProduct);
    }

    public function getProductDetails($id){
        $Product = DB::table('products')
                    ->join('categories','products.cat_id', '=', 'categories.id')
                    ->where('products.id','=', $id)
                    ->select('products.*','categories.cat_name')
                    ->first();
        
        //$data = $Product->toArray();
        //var_dump($Product);
        return response()->json($Product);
    }

    public function getProductSearch(Request $request){
        $searchProduct = Product::where('product_name', 'LIKE', "%$request->searchKey%")->get();
        return response()->json([
            'searchData' => $searchProduct
        ]);
    }

    public function getProductCheckbox(Request $request){
        
        $product = Product::where('cat_id', $request->category)->get();

        return response()->json([
            'multiProduct' => $product
        ]);
    }

    public function productComment(Request $request){
        $comment = new Comment();
        $comment->commenter_id = $request->commenterId;
        $comment->commentable_id = $request->productId;
        $comment->comment = $request->commentText;
        $comment->save();

        return response()->json($comment);
    }

    public function getProductComment($productId){
        //$comment = Comment::where('commentable_id', $productId)->get();
        $comment = DB::table('comments')
                    ->join('customers','comments.commenter_id', '=', 'customers.id')
                    ->where('comments.commentable_id', '=', $productId)
                    ->select('comments.*', 'customers.first_name', 'customers.last_name')
                    ->get();

        return response()->json($comment);
    }
}
