@extends('backEnd.home.master')
@section('title')
Add Category
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Category Create</h3>
                  <a class="btn btn-primary m-3" href="{{route('category')}}">Category Table</a>
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
                <form action="{{route('save.category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="category_name"><b>Category Name</b></label>
                      <input type="text" id="category_name" name="category_name" class="form-control my-2" placeholder="Enter Category Name">
                    </div>
                    <input type="submit" class="btn btn-info mt-3" value="Submit">
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection

