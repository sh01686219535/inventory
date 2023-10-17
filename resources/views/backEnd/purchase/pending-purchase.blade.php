@extends('backEnd.home.master')
@section('title')
Purchase Pending
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Purchase Pending Table</h2>
              <div class="supplier-main">
                 {{-- <a class="btn btn-primary m-3" href="{{route('add.purchase')}}">Add Purchase</a> --}}
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
                         <th>Purchase No</th>
                         <th>Data</th>
                         <th>Supplier</th>
                         <th>Category</th>
                         <th>Qty</th>
                         <th>Product Name</th>
                         <th>Status</th>
                         <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      @php $i = 1 @endphp
                     @foreach ($purchase as $purchases)
                     <tr>
                       <td>{{$i++}}</td>
                       <td>{{$purchases->purchase_no}}</td>
                       <td>{{$purchases->date}}</td>
                       <td>{{$purchases['supplier']['supplier_name']}}</td>
                       <td>{{$purchases['category']['category_name']}}</td>
                       <td>{{$purchases->buying_qty}}</td>
                       <td>{{$purchases['product']['product_name']}}</td>
                       <td>
                        @if($purchases->status == '0')
                        <span class="btn btn-warning">Pending</span>
                        @elseif($purchases->status == '1')
                        <span class="btn btn-success">Approved</span>
                        @endif

                       </td>
                       <td style="display: flex">
                        @if($purchases->status == '0')
                           <a href="{{route('approve.purchase',$purchases->id)}}" id="approveBtn" class="btn btn-danger m-1"><i class="fas fa-check-circle"></i></a>
                           @endif
                        </td>
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
