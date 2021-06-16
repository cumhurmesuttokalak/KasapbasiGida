<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function list(){

        $products = Product::where('is_deleted',0)->get();
        return view('panel.product.productlist',compact('products'));
    }
    function create(){
        $products = Product::where('is_deleted',0)->get();
        $categories = Category::where('is_deleted', 0)->get();
        return view('panel.product.productcreate',compact('products','categories'));
    }
    function ProductEkle(Request $request){
        $request->validate([
            'title'=>'required|min:2|max:255',
            'price'=>'required|numeric',

        ]);
        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->features = $request->input('features');


        $product->save();

        return redirect()->route('productlist');
    }
    function ProductUpdate($product_id)
    {
        $products = Product::find($product_id);
        $categories = Category::where('is_deleted', 0)->get();

        return view('panel.product.productupdate',compact('products','categories'));
    }
    function ProductUpdated(Request $request,$product_id){
        $request->validate([
            'title'=>'required|min:2|max:255',
            'price'=>'required|numeric',
            'features'=>'required|'
        ]);
        $products=Product::find($product_id);
        $products->category_id=$request->category_id;
        $products->title=$request->title;
        $products->price = $request->input('price');
        $products->features = $request->input('features');
        $products->save();
        return redirect()->route('productlist');
    }
    function delete($product_id,Request $request){
        $request->validate([
            'silbuton'=>'numeric',
        ]);
        $product = Product::find($product_id);
        $product ->is_deleted = 1;
        $product ->save();
        return redirect()->route('productlist');
    }
}
