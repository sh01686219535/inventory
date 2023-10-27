@extends('backEnd.home.master')
@section('title')
Supplier Wise
@endsection
@section('content')
 <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12 my-3">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Supplier Wise Stock Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Supplier Wise Stock Report</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h3>
                                                        <img src="{{asset('backEndAssets')}}/assets/img/logo/tech.png" alt="logo" height="60"/>
                                                    </h3>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-6 mt-4">
                                                        <address>
                                                            <strong>Tech Source Ltd.</strong><br>
                                                            Kathal Bagan Bazar, Dhaka<br>
                                                            tech-support@email.com
                                                        </address>
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                            <br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Sl</strong></td>
                                                                    <td class="text-center"><strong>Supplier Name</strong></td>
                                                                    <td class="text-center"><strong>Unit Name</strong>
                                                                    <td class="text-center"><strong>Category Name</strong>
                                                                    <td class="text-center"><strong>Product Name</strong>
                                                                    <td class="text-center"><strong>Stock</strong>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php
                                                                    $i = 1;
                                                                    $sub_total = '0';
                                                                @endphp
                                                            @foreach ($product as $item)
                                                            <tr>

                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">{{$item['supplier']['supplier_name']}}</td>
                                                            <td class="text-center">{{$item['unit']['unit_name']}}</td>
                                                            <td class="text-center">{{$item['category']['category_name']}}</td>
                                                            <td class="text-center">{{$item->product_name}}</td>
                                                            <td class="text-center">{{$item->quantity}}</td>
                                                        </tr>
                                                        @endforeach
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                         @php
                                                          $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
                                                         @endphp
                                                         <i>Printing time: {{$date->format('F j, Y, g:i ')}}</i>
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <!-- end row -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@endsection
