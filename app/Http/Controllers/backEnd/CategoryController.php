<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //category
    public function category(){
        $Category = Category::latest()->get();
        return view('backEnd.category.category',compact('Category'));
    }
    //addCategory
    public function addCategory(){
        return view('backEnd.category.add-category');
    }
    //savecategory
    public function savecategory(Request $request){
        $request->validate([
           'category_name'=>'required'
        ]);
       $Category = new Category();
       $Category->category_name = $request->category_name;
       $Category->save();
       $Category = array(
        'message'=>'Category Created Successfully',
        'alert-type'=>'success'
    );
    return redirect('/category')->with($Category);
    }
    //editCategory
    public function editCategory($id){
        $Category = Category::find($id);
        return view('backEnd.category.edit-category',compact('Category'));
    }
    //updateCategory
    public function updateCategory(Request $request){
        $Category = Category::find($request->category_id);
        $request->validate([
           'category_name'=>'required'
        ]);
       $Category->category_name = $request->category_name;
       $Category->save();
       $Category = array(
        'message'=>'Category updated Successfully',
        'alert-type'=>'success'
    );
    return redirect('/category')->with($Category);
    }
   //deletecategory
    public function deletecategory($id){
        $Category = Category::find($id);
        $Category->delete();
        $Category = array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($Category);
    }
}
