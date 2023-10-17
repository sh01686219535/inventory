@extends('backEnd.home.master')
@section('title')
Add Purchase
@endsection
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-head">
              <div class="supplier-main mt-5">
                 <h3 class="m-3">Purchase Create</h3>
                  <a class="btn btn-primary m-3" href="{{route('purchase')}}">Purchase Table</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-5">
        @include('backEnd.error')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group md-3">
                                <label for="date"><b>Date</b></label>
                                <input type="date" id="date" name="date" class="form-control my-2">
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group md-3">
                                <label for="purchase_no"><b>Purchase No</b></label>
                                <input type="text" id="purchase_no" name="purchase_no" class="form-control my-2" placeholder="Enter Purchase No">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group md-3">
                                <label for="supplier_id" class="mb-2"><b>Supplier Name</b></label>
                                <select id="supplier_id" name="supplier_id" class="form-select select2">
                                    <option value="">Select Supplier Name</option>
                                    @foreach ($supplier as $item)
                                        <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group md-3">
                                <label for="category_id" class="mb-2"><b>Category Name</b></label>
                                <select id="category_id" name="category_id" class="form-select  select2">
                                    <option value="">Select Category Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group md-3">
                                <label for="product_id" class="mb-2"><b>Product Name</b></label>
                                <select id="product_id" name="product_id" class="form-select select2" aria-lavel="default select example">
                                    <option value="">Select Supplier Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group md-3" style="margin-top: 30px">
                                <label for="product_name"><b></b></label>

                                <i class="btn btn-secondary btn-rounded waves-effect addEventMore" style="border-radius: 25px;"> <i class="fa-solid fa-circle-plus"></i>Add More</i>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-body">
                <form action="{{route('save.purchase')}}" method="post">
                    @csrf
                    <table class="table-sm table-bordered" style="width:100%; border-color:#ddd">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>PSC/KG</th>
                            <th>Unit Price</th>
                            <th>Description</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="addRow" class="add-row">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="5"></td>
                            <td>
                                <input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control estimated_amount" style="background: #ddd" readonly>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="form-group md-3" style="margin-top: 10px">
                        <input type="submit" value="Purchase Store"  class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
        </div>
      </div>
  </div>
@endsection
@push('js')
<script id="document-template" type="text/x-handlebars-template">
    <tr id="delete_add_more_data" class="delete_add_more_data">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" name="buying_qty[]" min="1" class="form-control buying_qty text-right" value="">
        </td>
        <td>
            <input type="number" name="unit_price[]" class="form-control unit_price text-right" value="">
        </td>
        <td>
            <input type="test" name="description[]" class="form-control">
        </td>
        <td>
            <input type="number" name="buying_price[]" class="form-control buying_price text-right" value="0" readonly>
        </td>
        <td>
        <i class="btn btn-danger btn-sm fas fa-window-close" id="removeEnentMore"></i>
        </td>
        </tr>
</script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click','.addEventMore',function () {
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            var source = $('#document-template').html(); // Corrected the variable name
            var template = Handlebars.compile(source); // Corrected the variable name
            var data = {
                date: date,
                purchase_no: purchase_no,
                supplier_id: supplier_id,
                category_id: category_id,
                category_name: category_name,
                product_id: product_id,
                product_name: product_name,
            };
            var html = template(data);
            $('#addRow').append(html);
        });
    });

    $(document).on('click','#removeEnentMore',function () {
        $(this).closest('.delete_add_more_data').remove();
        totalAmount();
    });
    $(document).on('keyup click','.unit_price,.buying_qty',function () {
        $unit_price = $(this).closest('tr').find('input.unit_price').val();
        $buying_qty = $(this).closest('tr').find('input.buying_qty').val();
        $total =  $unit_price * $buying_qty ;
        $(this).closest('tr').find('input.buying_price').val($total);
        totalAmount();
    });
    function totalAmount() {
        var sum = 0;
        $('.buying_price').each(function () {
            var value = $(this).val();
            if (!isNaN(value) && value.length !=0) {
                sum += parseFloat(value);
            }
        });
        $('#estimated_amount').val(sum);
    }
</script>
<script>

    //get category
    $(document).ready(function () {
        $('#supplier_id').change(function () {
            var supplier_id = $(this).val();
            $.ajax({
               url:"{{route('get-category')}}",
               type:'GET',
               dataType:'json',
               data:{supplier_id:supplier_id},
               success:function(data){
                $('#category_id').html(data);
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
               }
            });
        });
    });
     //get product
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

