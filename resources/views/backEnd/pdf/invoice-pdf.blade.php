@extends('backEnd.home.master')
@section('title')
Invoice Print
@endsection
@section('content')
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12 my-3">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Invoice No # {{$invoice->invoice_no}}</strong></h4>
                                                    <h3>
                                                        <img src="{{asset('backEndAssets')}}/assets/img/logo/tech.png" alt="logo" height="60"/>
                                                    </h3>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-6 mt-4">
                                                        <address>
                                                            <strong>Tech Source Ltd.</strong><br>
                                                            Kathal Bagan Bazar, Dhaka<br>
                                                            tech-support@email.com
                                                        </address>
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                            <strong>Order Date:</strong><br>
                                                            {{$invoice->date}}<br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                        $payment = App\Models\backEnd\Payment::where('invoice_id',$invoice->id)->first();
                                     @endphp
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Customer Name</strong></td>
                                                                    <td class="text-center"><strong>Customer Mobile</strong></td>
                                                                    <td class="text-center"><strong>Address</strong>
                                                                    <td class="text-center"><strong>Description</strong>
                                                                    </td>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                <tr>

                                                                    <td class="text-center"> {{$payment['customer']['customer_name']}}</td>
                                                                    <td class="text-center">{{$payment['customer']['customer_phone']}}</td>
                                                                    <td class="text-center">{{$payment['customer']['customer_address']}}</td>
                                                                    <td class="text-center">{{$invoice->description}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">

                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Sl</strong></td>
                                                                    <td class="text-center"><strong>Category</strong></td>
                                                                    <td class="text-center"><strong>Product Name</strong>
                                                                    <td class="text-center"><strong>Current Stock</strong>
                                                                    <td class="text-center"><strong>Quantity</strong>
                                                                    <td class="text-center"><strong>Unit Price</strong>
                                                                    <td class="text-center"><strong>Total Price</strong>
                                                                    </td>

                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php
                                                                    $i = 1;
                                                                    $sub_total = '0';
                                                                @endphp
                                                            @foreach ($invoice['invoiceDetails'] as $invoices)
                                                            <tr>

                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">{{$invoices['product']['product_name']}}</td>
                                                            <td class="text-center">{{$invoices['category']['category_name']}}</td>
                                                            <td class="text-center">{{$invoices['product']['quantity']}}</td>
                                                            <td class="text-center">{{$invoices->selling_qty}}</td>
                                                            <td class="text-center">{{$invoices->unit_price}}</td>
                                                            <td class="text-center">{{$invoices->selling_price}}</td>

                                                        </tr>
                                                        @php
                                                        $sub_total += $invoices->selling_price;
                                                        @endphp
                                                        @endforeach

                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center ">
                                                                    <strong>Subtotal</strong></td>
                                                                    <td class="text-center ">${{$sub_total}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Discount Amount</strong></td>
                                                                    <td class="text-center">${{$payment->discount_amount}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Paid Amount</strong></td>
                                                                    <td class="text-center">${{$payment->paid_amount}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Due Amount</strong></td>
                                                                    <td class="text-center">${{$payment->due_amount}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Grand Amount</strong></td>
                                                                    <td class="text-center">${{$payment->total_amount}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- end row -->


                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@endsection
