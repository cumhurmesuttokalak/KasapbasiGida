<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function list(){

        $categories = Category::where('is_deleted',0)->get();
        return view('panel.category.categorylist',compact('categories'));
    }
    public function create()
    {
        $categories = Category::where('is_deleted',0)->get();
        return view('panel.category.categorycreate',compact('categories'));

    }

    public function CategoryEkle(Request $request)
    {

        $request->validate([
            'title'=>'required|min:2|max:255',
        ]);
        $category = new Category();
        $category->title = $request->input('title');

        $category->save();

        return redirect()->route('categorylist');

    }
    function CategoryUpdate($category_id)
    {
        $categories = Category::find($category_id);
        return view('panel.category.categoryupdate',compact('categories'));
    }
    function CategoryUpdated(Request $request,$category_id){
        $request->validate([
            'title'=>'required|min:3|max:255',
        ]);
        $categories=Category::find($category_id);
        $categories->title=$request->title;
        $categories->save();
        return redirect()->route('categorylist');
    }
    function delete($category_id,Request $request){
        $request->validate([
            'silbuton'=>'numeric',
        ]);
        $category = Category::find($category_id);
        $category ->is_deleted = 1;
        $category ->save();
        return redirect()->route('categorylist');
    }
}
