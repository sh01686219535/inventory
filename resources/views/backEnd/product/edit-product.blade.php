@extends('backEnd.home.master')
@section('title')
Update Product
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Product Update</h3>
                  <a class="btn btn-primary m-3" href="{{route('product')}}">Product Table</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-5">
        @include('backEnd.error')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                <form action="{{route('update.product')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group">
                      <label for="supplier_id"><b>Supplier Name</b></label>
                      <select name="supplier_id" id="supplier_id" class="form-control my-2">
                        <option value="">Select Supplier Name</option>
                        @foreach ($supplier as $suppliers)
                           <option value="{{$suppliers->id}}"{{$suppliers->id == $product->supplier_id ? 'selected' : ''}}>{{$suppliers->supplier_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="unit_id"><b>Unit Name</b></label>
                        <select name="unit_id" id="unit_id" class="form-control my-2">
                            <option value="">Select Unit Name</option>
                            @foreach ($unit as $units)
                               <option value="{{$units->id}}"{{$units->id == $product->unit_id ? 'selected' : ''}}>{{$units->unit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id"><b>Category Name</b></label>
                        <select name="category_id" id="category_id" class="form-control my-2">
                            <option value="">Select Category Name</option>
                            @foreach ($category as $categories)
                               <option value="{{$categories->id}}"{{$categories->id == $product->category_id ? 'selected' : ''}}>{{$categories->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name"><b>Product Name</b></label>
                        <input type="text" id="product_name" name="product_name" value="{{$product->product_name}}" class="form-control my-2" placeholder="Enter Product Name">
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection

