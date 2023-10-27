@extends('backEnd.home.master')
@section('title')
Customer Invoice
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
                                    <h4 class="mb-sm-0">Customer Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Customer Invoice</li>
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
                                                    <a class="btn btn-primary m-3" href="{{route('Credit.customer')}}" ><i class="fas fa-list"></i> Back</a>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        @php
                                     @endphp
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Customer Invoice (Invoice No: #{{$payment['invoice']['invoice_no']}})</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td class="text-center"><strong>Customer Name</strong></td>
                                                                    <td class="text-center"><strong>Customer Mobile</strong></td>
                                                                    <td class="text-center"><strong>Address</strong>
                                                                </td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="text-center"> {{$payment['customer']['customer_name']}}</td>
                                                                    <td class="text-center">{{$payment['customer']['customer_phone']}}</td>
                                                                    <td class="text-center">{{$payment['customer']['customer_address']}}</td>
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
                                                <form action="{{route('customer.update.invoice')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="invoice_id" value="{{$payment->invoice_id}}">
                                                <div>
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
                                                                    $invoiceDetails = App\Models\backEnd\InvoiceDetails::where('invoice_id',$payment->invoice_id)->get();
                                                                @endphp
                                                            @foreach ($invoiceDetails as $invoices)
                                                            <tr>

                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">{{$invoices['category']['category_name']}}</td>
                                                            <td class="text-center">{{$invoices['product']['product_name']}}</td>
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
                                                                        <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
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
                                                      <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label for="paid_status">Paid Status</label>
                                                            <select name="paid_status" id="paid_status" class="form-select my-2">
                                                                <option value="">Select Status</option>
                                                                <option value="full_paid">Full Paid</option>
                                                                <option value="partial_paid">Partial Paid</option>
                                                            </select>
                                                            <input type="text" name="paid_amount" style="display: none;" class="form-control paid_amount" placeholder="Enter Paid Amount">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div>
                                                                <label for="date"><b>Date</b></label>
                                                                <input type="date" id="date" name="date"  class="form-control my-2">
                                                              </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <div>
                                                                <label for="date"><b></b></label>
                                                                <input type="submit" class="btn btn-info" value="Update Customer">
                                                              </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                               </form>
                                            </div>
                                        </div> <!-- end row -->


                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@endsection
@push('js')
<script>
    $(document).on('change','#paid_status',function () {
    var paidStatus  = $(this).val();
    if (paidStatus == 'partial_paid') {
        $('.paid_amount').show();
    }else{
        $('.paid_amount').hide();
    }
});

</script>
@endpush
