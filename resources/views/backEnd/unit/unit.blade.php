@extends('backEnd.home.master')
@section('title')
Unit
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Unit Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.unit')}}"><i class="fas fa-plus-circle"></i>Add Unit</a>
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
                          <th>Name</th>
                          <th style="width:30%">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                      @php $i = 1 @endphp
                      @foreach ($unit as $units)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$units->unit_name}}</td>
                        <td>
                            <a href="{{route('edit.unit',$units->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('delete.unit',$units->id)}}" id="delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>

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
