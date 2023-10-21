<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Category;
use App\Models\backEnd\Customer;
use App\Models\backEnd\Invoice;
use App\Models\backEnd\InvoiceDetails;
use App\Models\backEnd\Payment;
use App\Models\backEnd\PaymentDetails;
use App\Models\backEnd\Product;
use App\Models\backEnd\Unit;
use App\Models\Supplier;
use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    //invoice
    public function invoice(){
        $invoice = Invoice::orderBy('date','desc')->orderBy('date','desc')->where('status','1')->get();
        return view('backEnd.invoice.invoice',compact('invoice'));
    }
    //addInvoice
    public function addInvoice(){
        $Invoice = Invoice::orderBy('date','desc')->first();
        if ($Invoice == null) {
            $firstReg = '0';
            $invoiceNo = $firstReg+1;
        }else {
            $Invoice = Invoice::orderBy('date','desc')->first()->invoice_no;
            $invoiceNo = $Invoice+1;

        }
        // dd($Invoice);
        $date = Date('Y-m-d');
        $category = Category::all();
        $customer = Customer::all();
        return view('backEnd.invoice.add-invoice',compact('customer','invoiceNo','category','date'));
    }
    //saveInvoice
    public function saveInvoice(Request $request){
        if ($request->category_id == null) {
            $notification = array(
                'message'=> 'Sorry You do not select any Item',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }else{
            if ($request->paid_amount > $request->estimated_amount) {
                $notification = array(
                    'message'=> 'Sorry Paid amount Maximum the total price',
                    'alert-type'=>'error'
                );
                return back()->with($notification);
            }else{
                $invoice = new Invoice();
                $invoice->invoice_no = $request->invoice_no;
                $invoice->date = $request->date;
                $invoice->description = $request->description;
                $invoice->status = '0';

                DB::transaction(function() use($request,$invoice) {
                   if ($invoice->save()) {
                    $countCategory = count($request->category_id);
                    for ($i=0; $i < $countCategory; $i++) {
                        $invoiceDetails =  new InvoiceDetails();
                        $invoiceDetails->date = $request->date;
                        $invoiceDetails->invoice_id	 = $invoice->id;
                        $invoiceDetails->category_id = $request->category_id[$i];
                        $invoiceDetails->selling_qty = $request->selling_qty[$i];
                        $invoiceDetails->selling_price = $request->selling_price[$i];
                        $invoiceDetails->unit_price = $request->unit_price[$i];
                        $invoiceDetails->product_id = $request->product_id[$i];
                        $invoiceDetails->status = '1';
                        $invoiceDetails->save();

                    }
                    if ($request->customer_id == '0') {
                        $customer = new Customer();
                        $customer->customer_name =  $request->customer_name;
                        $customer->customer_phone =  $request->customer_phone;
                        $customer->customer_email =  $request->customer_email;
                        $customer->save();
                        $customer_id = $customer->id;
                    }else{
                        $customer_id = $request->customer_id;
                    }
                    $payment = new Payment();
                    $paymentDetails = new PaymentDetails();
                    $payment->invoice_id = $invoice->id;
                    $payment->customer_id  = $customer_id;
                    $payment->discount_amount = $request->discount_amount;
                    $payment->paid_status = $request->paid_status;
                    $payment->total_amount = $request->estimated_amount;

                    if ($payment->paid_status == 'full_pai') {
                        $payment->paid_amount = $request->estimated_amount;
                        $payment->due_amount = '0';
                        $paymentDetails->current_paid_amount = $request->estimated_amount;
                    }elseif ($payment->paid_status == 'full_due') {
                        $payment->paid_amount = '0';
                        $payment->due_amount = $request->estimated_amount;
                        $paymentDetails->current_paid_amount = '0';
                    }elseif ($payment->paid_status == 'partial_paid') {
                        $payment->paid_amount = $request->paid_amount;
                        $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                        $paymentDetails->current_paid_amount = $request->paid_amount;
                    }
                    $payment->save();
                    $paymentDetails->invoice_id = $invoice->id;
                    $paymentDetails->date = $request->date;
                    $paymentDetails->save();
                   }
                });
            }
        }
        $notification = array(
            'message'=> 'Invoice Store Successfully',
            'alert-type'=>'success'
        );
        return redirect('/invoice')->with($notification);
    }
    //pendingInvoice
    public function pendingInvoice(){
        $invoice = Invoice::orderBy('date','desc')->orderBy('date','desc')->where('status','0')->get();
        return view('backEnd.invoice.pending-invoice',compact('invoice'));
    }
    //deleteInvoice
    public function deleteInvoice($id){
        $invoice = Invoice::find($id);
        $invoice->delete();
        InvoiceDetails::where('invoice_id',$invoice->id)->delete();
        Payment::where('invoice_id',$invoice->id)->delete();
        PaymentDetails::where('invoice_id',$invoice->id)->delete();
        $invoiceDelete = array(
            'message'=>'Invoice Delete Successfully',
            'alert-type'=>'success'
        );
        return back()->with($invoiceDelete);
    }
    //approveInvoice
    public function approveInvoice($id){
        $invoice = Invoice::with('invoiceDetails')->find($id);
        return view('backEnd.invoice.approve-invoice',compact('invoice'));
    }
    //approveInvoiceStore
    public function approveInvoiceStore(Request $request,$id){
        foreach ($request->selling_qty as $key => $value) {
            $invoiceDetils = InvoiceDetails::where('id',$key)->first();
            $product = Product::where('id',$invoiceDetils->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                $invoiceDelete = array(
                    'message'=>'Sorry Your approve Maximum value',
                    'alert-type'=>'error'
                );
                return back()->with($invoiceDelete);
            }

        }
        $invoice = Invoice::find($id);
        $invoice->status = '1';

        DB::transaction(function () use($request,$invoice,$id){
            foreach ($request->selling_qty as $key => $value) {
                $invoiceDetils = InvoiceDetails::where('id',$key)->first();
                $product = Product::where('id',$invoiceDetils->product_id)->first();
                $product->quantity = ((float)$product->quantity) - ((float)$request->selling_qty[$key]);
                $product->save();
            }
            $invoice->save();

        });
        $invoiceDelete = array(
            'message'=>'Invoice approve Successfully',
            'alert-type'=>'success'
        );
        return redirect('/pending-invoice')->with($invoiceDelete);
    }

    //printInvoice
    public function printInvoice(){
        $invoice = Invoice::orderBy('date','desc')->orderBy('date','desc')->where('status','1')->get();
        return view('backEnd.invoice.print_invoice_list',compact('invoice'));
    }

}
