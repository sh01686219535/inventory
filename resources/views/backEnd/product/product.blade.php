@extends('backEnd.home.master')
@section('title')
Product
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Product Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.product')}}"><i class="fas fa-plus-circle"></i>Add Product</a>
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
                          <th>Product Name</th>
                          <th>Supplier Name</th>
                          <th>Unit Name</th>
                          <th>Category Name</th>
                          <th>Action</th>
                         </tr>
                      </thead>
                      <tbody>
                       @php $i = 1 @endphp
                      @foreach ($product as $products)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$products->product_name}}</td>
                        <td>{{$products['supplier']['supplier_name']}}</td>
                        <td>{{$products['unit']['unit_name']}}</td>
                        <td>{{$products['category']['category_name']}}</td>
                        <td>
                            <a href="{{route('edit.product',$products->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('delete.product',$products->id)}}" id="delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>

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
