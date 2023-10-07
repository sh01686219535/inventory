<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Category;
use App\Models\backEnd\Product;
use App\Models\backEnd\Unit;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //product
    public function product(){
        $product = Product::latest()->get();
        return view('backEnd.product.product',compact('product'));
    }
    //addProduct
    public function addProduct(){
        $supplier = Supplier::latest()->get();
        $unit = Unit::latest()->get();
        $category = Category::latest()->get();
        return view('backEnd.product.add-product',compact('supplier','unit','category'));
    }
    //saveProducty
    public function saveProduct(Request $request){
        $request->validate([
            'supplier_id'=>'required',
            'unit_id'=>'required',
            'category_id'=>'required',
         ]);
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->save();
        $product = array(
            'message'=>'Product Create Successfully',
            'alert-type'=>'success'
        );
        return redirect('/product')->with($product);
    }
    //editProduct
    public function editProduct($id){
        $product = Product::find($id);
        $supplier = Supplier::latest()->get();
        $unit = Unit::latest()->get();
        $category = Category::latest()->get();
        return view('backEnd.product.edit-product',compact('product','supplier','unit','category'));
    }
    //deleteProduct
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        $product = array(
            'message'=>'Product Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($product);
    }
    //updateProduct
    public function updateProduct(Request $request){
        $product = Product::find($request->product_id);
        $request->validate([
            'supplier_id'=>'required',
            'unit_id'=>'required',
            'category_id'=>'required',
         ]);
        $product->product_name = $request->product_name;
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->save();
        $product = array(
            'message'=>'Product Update Successfully',
            'alert-type'=>'success'
        );
        return redirect('/product')->with($product);
    }
}
