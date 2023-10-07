<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    //getCategory
    public function getCategory(Request $request){
        $supplier_id = $request->supplier_id;
        $product = Product::where('supplier_id',$supplier_id)->get();
        $html = '<option value="">Select Category Name</option>';
        foreach ($product as $value) {
            $html .= '<option value="'.$value->category_id.'">'.$value->category->category_name.'</option>';
        }
        return response()->json($html);
    }
    //getProduct
    public function getProduct(Request $request){
        $category_id = $request->category_id;
        $product = Product::where('category_id',$category_id)->get();

        $html = '<option value="">Select Product Name</option>';
        foreach ($product as $value) {
            $html .= '<option value="'.$value->id.'">'.$value->product_name.'</option>';
        }
        return response()->json($html);
    }
}
