@extends('backEnd.home.master')
@section('title')
Invoice
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
            @php
               $payment = App\Models\backEnd\Payment::where('invoice_id',$invoice->id)->first();
            @endphp
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Invoice Table</h2>
              <div class="supplier-main m-3">
                <div class="invoice">
                    <h4>Invoice No: #{{$invoice->invoice_no}}- {{$invoice->date}}</h4>
                  </div>
                  <div class="">
                    <a class="btn btn-primary"  href="{{route('pending.invoice')}}"><i class="fas fa-plus-list"></i>Pending Invoice List</a>
                  </div>
              </div>
              <table class="table table-dark">
                <thead>
                  <tr>
                    <td ><p>Customer Info</p></td>
                    <td ><p>Name: {{$payment['customer']['customer_name']}}</p></td>
                    <td ><p>Mobile: {{$payment['customer']['customer_phone']}}</p></td>
                    <td ><p>Email: {{$payment['customer']['customer_email']}}</p></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3"><p>Description: <strong>{{$invoice->description}}</strong></p></td>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table><br>
              <form action="{{route('approve.invoice.store',$invoice->id)}}" method="post">
                @csrf
                <table class="table table-dark" border="1">
                    <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Current Stock</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Unit Price</th>
                            <th class="text-center">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                                $i = 1;
                                $sub_total = '0';
                            @endphp
                            @foreach ($invoice['invoiceDetails'] as $invoices)
                        <tr>
                            <input type="hidden" name="category_id[]" value="{{$invoices->category_id}}">
                            <input type="hidden" name="product_id[]" value="{{$invoices->product_id}}">
                            <input type="hidden" name="selling_qty[{{$invoices->id}}]" value="{{$invoices->selling_qty}}">

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
                            <td colspan="6">Sub Total</td>
                            <td >    {{$sub_total}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">Discount  Amount</td>
                            <td >    {{$payment->discount_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">Paid Amount</td>
                            <td >    {{$payment->paid_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">Due Amount</td>
                            <td >    {{$payment->due_amount}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">Grand Amount</td>
                            <td >    {{$payment->total_amount}}</td>
                        </tr>
                    </tbody>
                </table>

                <input type="submit" value="Invoice Approval" class="btn btn-info my-3">
              </form>
            </div>

          </div>
        </div>
      </div>
  </div>

@endsection

