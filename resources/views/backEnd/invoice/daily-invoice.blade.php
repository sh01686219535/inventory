@extends('backEnd.home.master')
@section('title')
Add Invoice
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Invoice Create</h3>
                  <a class="btn btn-primary m-3" href="{{route('invoice')}}">Invoice Table</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-5">
        @include('backEnd.error')
        <div class="col-md-12">
            <div class="card">
               <form action="" method="POST" target="_blank">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group md-3">
                                <label for="start_date"><b>Start Date</b></label>
                                <input type="date" id="start_date" name="start_date" class="form-control my-2">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group md-3">
                                <label for="end_date"><b>End Date</b></label>
                                <input type="date" id="end_date" name="end_date" class="form-control my-2">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group md-3 mt-1">
                                <label for="search"><b></b></label>
                                <input type="submit" id="search" value="Search" class="btn btn-info mt-4">
                            </div>
                        </div>
                    </div>
                </div>
               </form>
            </div>
        </div>
      </div>
  </div>
@endsection

