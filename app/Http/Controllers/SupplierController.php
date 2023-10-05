<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //supplier
    public function supplier(){
        $supplier = Supplier::latest()->get();
        return view('backEnd.supplier.supplier',compact('supplier'));
    }
    //addSupplier
    public function addSupplier(){
        return view('backEnd.supplier.add-supplier');
    }
    //saveSupplier
    public function saveSupplier(Request $request){
        $request->validate([
            'supplier_name'=>'required',
            'supplier_email'=>'required|email|',
            'supplier_phone'=>'required',
            'supplier_address'=>'required',
        ]);
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
        $message = array(
            'message'=> 'Supplier Create Successfully',
            'alert-type' => 'success'
        );
       return redirect('/supplier')->with($message);
    }
    //editSupplier
    public function editSupplier($id){
        $supplier = Supplier::find($id);
        return view('backEnd.supplier.edit-supplier',compact('supplier'));
    }
    //updateSupplier
    public function updateSupplier(Request $request){
        $supplier = Supplier::find($request->supplier_id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
        $message = array(
            'message'=> 'Supplier Update Successfully',
            'alert-type' => 'success'
        );
       return redirect('/supplier')->with($message);
    }
    //deleteSupplier
    public function deleteSupplier($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        $message = array(
            'message'=> 'Supplier Delete Successfully',
            'alert-type' => 'success'
        );
       return back()->with($message);
    }
}
