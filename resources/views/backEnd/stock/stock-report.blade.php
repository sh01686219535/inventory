@extends('backEnd.home.master')
@section('title')
Stock Report
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Stock Report Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('stock.report.pdf')}}" target="_blank"><i class="fas fa-print"></i>Stock Report Print</a>
                 <div class="search-supplier m-3">
                  <form action="" method="post" class="supplier-form">
                    @csrf
                    <input type="text" placeholder="Search.." name="search2">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                 </div>
              </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                      <thead>
                         <tr>
                          <th>Sl</th>
                          <th>Supplier Name</th>
                          <th>Unit Name</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>In Qty</th>
                          <th>Out Qty</th>
                          <th>Stock</th>
                         </tr>
                      </thead>
                      <tbody>
                      @php $i = 1 @endphp
                      @foreach ($product as $products)
                      @php
                       $buying_total =App\Models\backEnd\Purchase::where('category_id',$products->category_id)->
                       where('product_id',$products->id)->where('status','1')->sum('buying_qty');

                       $selling_total = App\Models\backEnd\InvoiceDetails::where('category_id',$products->category_id)->
                       where('product_id',$products->id)->where('status','1')->sum('selling_qty');
                       @endphp
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$products['supplier']['supplier_name']}}</td>
                        <td>{{$products['unit']['unit_name']}}</td>
                        <td>{{$products['category']['category_name']}}</td>
                        <td>{{$products->product_name}}</td>
                        <td><span class="btn btn-primary">{{$buying_total}}</span></td>
                        <td><span class="btn btn-info">{{$selling_total}}</span></td>
                        <td><span class="btn btn-danger">{{$products->quantity}}</span></td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
