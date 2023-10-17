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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="invoice_no" class="mb-2"><b>Inv No</b></label>
                                <input type="text" id="invoice_no" value="{{$invoiceNo}}" name="invoice_no" class="form-control " readonly style="background:#ddd">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group md-3">
                                <label for="date"><b>Date</b></label>
                                <input type="date" id="date" name="date" value="{{$date}}" class="form-control my-2">
                              </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group md-3">
                                <label for="category_id" class="mb-2"><b>Category Name</b></label>
                                <select id="category_id" name="category_id" class="form-select select2">
                                    <option value="">Select Category Name</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group md-3">
                                <label for="product_id" class="mb-2"><b>Product Name</b></label>
                                <select id="product_id" name="product_id" class="form-control select2" aria-lavel="default select example">
                                    <option value="">Select Supplier Name</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="invoice_no" class="mb-2"><b>Stock(pcs/kg)</b></label>
                                <input type="text" id="current_stock_qty" name="current_stock_qty" class="form-control" readonly style="background:#ddd">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group md-3 ">
                                <label for="product_name"><b></b></label>
                                <i class="btn-p btn btn-secondary btn-rounded waves-effect addEventMore" style="border-radius: 25px;"> <i class="fa-solid fa-circle-plus"></i>Add More</i>
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
                            <th width="7%">PSC/KG</th>
                            <th width="12%">Unit Price</th>
                            <th width="13%">Total Price</th>
                            <th width="7%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="addRow" class="add-row">

                    </tbody>
                    <tbody>
                        <tr>
                            <td colspan="4">Discount Amount</td>
                            <td>
                                <input type="text" name="discount_amount" id="discount_amount" class="form-control estimated_amount" placeholder="Discount Amount">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4">Grand Total</td>
                            <td>
                                <input type="text" name="estimated_amount" id="estimated_amount" value="0" class="form-control estimated_amount" style="background: #ddd" readonly>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="form-row my-2">
                        <div class="form-group col-md-12">
                            <textarea name="description" id="description" class="form-control" placeholder="Enter Description here"></textarea>
                        </div>
                    </div>
                    <div class="form-group md-3" style="margin-top: 10px">
                        <input type="submit" value="Invoice Store"  class="btn btn-info">
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
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{category_name}}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{product_name}}
        </td>
        <td>
            <input type="number" name="selling_qty[]" min="1" class="form-control selling_qty text-right" value="">
        </td>
        <td>
            <input type="number" name="unit_price[]" class="form-control unit_price text-right" value="">
        </td>
        <td>
            <input type="number" name="selling_price[]" class="form-control selling_price text-right" value="0" readonly>
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
            var invoice_no = $('#invoice_no').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            var source = $('#document-template').html(); // Corrected the variable name
            var template = Handlebars.compile(source); // Corrected the variable name
            var data = {
                date: date,
                invoice_no: invoice_no,
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
    $(document).on('keyup click','.unit_price,.selling_qty',function () {
        $unit_price = $(this).closest('tr').find('input.unit_price').val();
        $buying_qty = $(this).closest('tr').find('input.selling_qty').val();
        $total =  $unit_price * $buying_qty ;
        $(this).closest('tr').find('input.selling_price').val($total);
        $('#discount_amount').trigger('keyup');
    });
    $(document).on('keyup','#discount_amount',function () {
        totalAmount();
    });
    function totalAmount() {
        var sum = 0;
        $('.selling_price').each(function () {
            var value = $(this).val();
            if (!isNaN(value) && value.length !=0) {
                sum += parseFloat(value);
            }
        });
        var discount_amount = parseFloat($('#discount_amount').val());
        if (!isNaN(discount_amount) && discount_amount.length !=0) {
                sum -= parseFloat(discount_amount);
            }
        $('#estimated_amount').val(sum);
    }
</script>
<script>
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
     //get product stock
     $(document).ready(function () {
        $('#product_id').change(function () {
            var product_id = $(this).val();
            $.ajax({
               url:"{{route('get-product-stock')}}",
               type:'GET',
               dataType:'json',
               data:{product_id:product_id},
               success:function(data){
                $('#current_stock_qty').val(data);
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
               }
            });
        });
    });
</script>

@endpush

