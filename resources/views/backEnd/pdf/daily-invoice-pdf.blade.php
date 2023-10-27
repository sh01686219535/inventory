@extends('backEnd.home.master')
@section('title')
Daily Invoice Report
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
                                    <h4 class="mb-sm-0">Daily Invoice Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Daily Invoice Report</li>
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
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Daily Invoice Report
                                                            <span class="btn btn-info">{{$start_date}}</span> -
                                                            <span class="btn btn-success">{{$end_date}}</span>
                                                        </strong></h3>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">

                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Sl</strong></td>
                                                                    <td class="text-center"><strong>Customer Name</strong></td>
                                                                    <td class="text-center"><strong>Invoice No</strong>
                                                                    <td class="text-center"><strong>Data</strong>
                                                                    <td class="text-center"><strong>Description</strong>
                                                                    <td class="text-center"><strong>Amount</strong>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php
                                                                    $i = 1;
                                                                    $sub_total = '0';
                                                                @endphp
                                                            @foreach ($allData as $item)
                                                            <tr>

                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">{{$item['payment']['customer']['customer_name']}}</td>
                                                            <td class="text-center"># {{$item->invoice_no}}</td>
                                                            <td class="text-center">{{$item->date}}</td>
                                                            <td class="text-center">{{$item->description}}</td>
                                                            <td class="text-center">{{$item['payment']['total_amount']}}</td>


                                                        </tr>
                                                        @php
                                                        $sub_total += $item['payment']['total_amount'];
                                                        @endphp
                                                        @endforeach
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Grand Amount</strong></td>
                                                                    <td class="text-center">${{$sub_total}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">Download</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- end row -->


                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@endsection
