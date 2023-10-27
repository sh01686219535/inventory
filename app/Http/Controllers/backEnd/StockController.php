<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Category;
use App\Models\backEnd\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //stockReport
    public function stockReport(){
        $product = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backEnd.stock.stock-report',compact('product'));
    }
    //stockReportPdf
    public function stockReportPdf(){
        $product = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->get();
        return view('backEnd.pdf.stock-report-pdf',compact('product'));
    }
    //stockSupplierWise
    public function stockSupplierWise(){
        $supplier = Supplier::all();
        $category = Category::all();
        return view('backEnd.stock.supplier-product-wise-report',compact('supplier','category'));
    }
    //supplierWisePdf
    public function supplierWisePdf(Request $request){
        $product = Product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        return view('backEnd.pdf.supplier-wise-pdf',compact('product'));
    }
    //productWisePdf
    public function productWisePdf(Request $request){
        $product = Product::where('category_id',$request->category_id)->where('id',$request->product_id)->first();
        return view('backEnd.pdf.product-wise-pdf',compact('product'));
    }
}
