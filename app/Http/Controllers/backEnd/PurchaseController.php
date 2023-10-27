<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Product;
use App\Models\backEnd\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //purchase
    public function purchase(){
        $purchase = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backEnd.purchase.purchase',compact('purchase'));
    }
    //addPurchase
    public function addPurchase(){
        $product = Product::latest()->get();
        $supplier = Supplier::latest()->get();

        return view('backEnd.purchase.add-purchase',compact('supplier','product'));
    }
    //savePurchase
    public function savePurchase(Request $request){
        if ($request->category_id ==null) {
            $product = array(
                'message'=>'Sorry You do not select eany item',
                'alert-type'=>'error'
            );
            return back()->with($product);
        }else{
            $countCategory = count($request->category_id);
            for ($i=0; $i <$countCategory ; $i++) {
                $product = new Purchase();
                $product->date = $request->date[$i];
                $product->purchase_no = $request->purchase_no[$i];
                $product->supplier_id = $request->supplier_id[$i];
                $product->category_id = $request->category_id[$i];
                $product->product_id = $request->product_id[$i];
                $product->buying_qty = $request->buying_qty[$i];
                $product->unit_price = $request->unit_price[$i];
                $product->description = $request->description[$i];
                $product->buying_price = $request->buying_price[$i];
                $product->status  = "0";
                $product->save();
            }
        }
        $product = array(
            'message'=>'Data Create successfully',
            'alert-type'=>'success'
        );
        return redirect('/purchase')->with($product);
    }
    //deletePurchase
    public function deletePurchase($id){
        $product = Purchase::find($id);
        $product->delete();
        $product = array(
            'message'=>'Data Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect('/purchase')->with($product);
    }

    //pendingPurchase
    public function pendingPurchase(){
        $purchase = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backEnd.purchase.pending-purchase',compact('purchase'));
    }
    //approvePurchase
    public function approvePurchase($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchaseQty = ((float)$purchase->buying_qty)+((float)$product->quantity);
        $product->quantity = $purchaseQty;
        if ($product->save()) {
            Purchase::find($id)->update([
                'status' => '1'
            ]);
            $purchase = array(
                'message'=>'Purchase Approve successfully',
                'alert-type'=>'success'
            );
            return redirect('/purchase')->with($purchase);
        }
    }

    //dailyPurchaseReport
    public function dailyPurchaseReport(){
        // $purchase = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backEnd.purchase.daily-purchase-report');
    }
    //dailyPurchasePdf
    public function dailyPurchasePdf(Request $reqest){
        $sdate = $reqest->start_date;
        $edate = $reqest->end_date;
        $allData = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->get();
        $start_date = $reqest->start_date;
        $end_date = $reqest->end_date;
        return view('backEnd.pdf.daily-purchase-pdf',compact('allData','start_date','end_date'));
    }
}
