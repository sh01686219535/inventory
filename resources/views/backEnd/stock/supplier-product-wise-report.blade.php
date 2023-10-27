@extends('backEnd.home.master')
@section('title')
Supplier Wise Stock Report
@endsection
@section('content')
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <h2 class="text-center my-5">Supplier Product Wise  Report</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Supplier wise Report</span>
                        <input type="radio" name="supplier_report" value="Supplier_Wise" class="search_value">&nbsp;&nbsp;
                        <span>Supplier wise Report</span>
                        <input type="radio" name="supplier_report" value="product_Wise" class="search_value">
                    </div>
                </div>
                {{-- Start Supplier wise  --}}
                <div class="supplier-wise" style="display: none">
                    <form action="{{route('supplier.wise.pdf')}}" method="get" target="_blank">
                        <div class="row">
                            <div class="col-md-8 form-group">
                                    <label for="supplier_id" class="my-2"><b>Supplier Name</b></label>
                                    <select name="supplier_id" id="supplier_id" class="form-select">
                                      <option value="">Select Supplier Name</option>
                                      @foreach ($supplier as $suppliers)
                                         <option value="{{$suppliers->id}}">{{$suppliers->supplier_name}}</option>
                                      @endforeach
                                    </select>
                            </div>
                            <div class="col-md-4 " style="margin-top: 37px;">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                {{-- End Supplier wise  --}}
                {{-- Start Product wise  --}}
                <div class="product-wise" style="display: none">
                    <form action="{{route('product.wise.pdf')}}" method="get" target="_blank">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group md-3">
                                    <label for="category_id" class="mb-2"><b>Category Name</b></label>
                                    <select id="category_id" name="category_id" class="form-select">
                                        <option value="">Select Category Name</option>
                                        @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group md-3">
                                    <label for="product_id" class="mb-2"><b>Product Name</b></label>
                                    <select id="product_id" name="product_id" class="form-control" aria-lavel="default select example">
                                        <option value="">Select Supplier Name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 " style="margin-top: 35px;">
                                <input type="submit" class="btn btn-primary" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                {{-- End Product wise  --}}

            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
@push('js')
<script>
    // supplier wise
    $(document).on('change','.search_value',function () {
       var Supplier_value = $(this).val();
       if (Supplier_value == 'Supplier_Wise') {
        $('.supplier-wise').show();
       }else{
        $('.supplier-wise').hide();
       }
    });
       // Product wise
       $(document).on('change','.search_value',function () {
       var product_value = $(this).val();
       if (product_value == 'product_Wise') {
        $('.product-wise').show();
       }else{
        $('.product-wise').hide();
       }
    });
    //category wise product
    $(document).ready(function () {
        $('#category_id').change(function () {
            var category_id = $(this).val();

            $.ajax({
               url:"{{route('get-product')}}",
               type:'GET',
               dataType:'json',
               data:{category_id:category_id},
               success:function(data){
                $('#product_id').html(data);
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
               }
            });
        });
    });
</script>
@endpush


