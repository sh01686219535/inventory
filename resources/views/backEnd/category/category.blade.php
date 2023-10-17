@extends('backEnd.home.master')
@section('title')
Category
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Category Table</h2>
              <div class="supplier-main">
                 <a class="btn btn-primary m-3" href="{{route('add.category')}}"><i class="fas fa-plus-circle"></i>Add Category</a>
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
                          <th style="width:25%">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                       @php $i = 1 @endphp
                      @foreach ($Category as $Categories)
                       <tr>
                        <td>{{$i++}}</td>
                        <td>{{$Categories->category_name}}</td>
                        <td>
                            <a href="{{route('edit.category',$Categories->id)}}" class="btn btn-primary btn-weight"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{route('delete.category',$Categories->id)}}" id="delete" class="btn btn-danger btn-weight"><i class="fa-solid fa-trash-can"></i></a>

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
