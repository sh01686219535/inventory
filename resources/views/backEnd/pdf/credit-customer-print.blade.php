@extends('backEnd.home.master')
@section('title')
Cridit Customer Report
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
                                    <h4 class="mb-sm-0">Cridit Customer Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                            <li class="breadcrumb-item active">Cridit Customer Report</li>
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
                                         <!-- end row -->
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
                                                                    <td class="text-center"><strong>Dur Amount</strong>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @php
                                                                    $i = 1;
                                                                    $total_due = '0';
                                                                @endphp
                                                            @foreach ($payment as $item)
                                                            <tr>

                                                            <td class="text-center">{{$i++}}</td>
                                                            <td class="text-center">{{$item['customer']['customer_name']}}</td>
                                                            <td class="text-center"># {{$item['invoice']['invoice_no']}}</td>
                                                            <td class="text-center">{{$item['invoice']['date']}}</td>
                                                            <td class="text-center">{{$item->due_amount}}</td>
                                                        </tr>
                                                        @php
                                                        $total_due += $item->due_amount;
                                                        @endphp
                                                        @endforeach
                                                                <tr>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center"></td>
                                                                    <td class="text-center">
                                                                        <strong>Grand Due Amount</strong></td>
                                                                    <td class="text-center">${{$total_due}}</td>
                                                                </tr>
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
                                        </div> <!-- end row -->


                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

@endsection
