@extends('Template_file.master')

@section('title', 'Invoice')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Invoice Template</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Invoice</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a></div>
                        </div><a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="ft-mail"></i></a><a class="btn btn-outline-primary" href="timeline-center.html"><i class="ft-pie-chart"></i></a>
                    </div>
                </div>
            </div>
            <div class="content-body"><section class="card">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <div class="media">
                                    <img src="{{asset('template_asset/app-assets/images/logo/stack-80x80.png')}}" alt="company logo" class=""/>
                                    <div class="media-body">
                                        <ul class="ml-2 px-0 list-unstyled">
                                            <li class="text-bold-800">Shop Name</li>
                                            <li>YONOSCO</li>
                                            <li>GEC Circle</li>
                                            <li>CHITTAGONG,</li>
                                            <li>Bangladesh</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <h2>INVOICE</h2>
                                <p class="pb-3">#{{$receipt_no}}</p>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->

                        <!-- Invoice Customer Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-12 text-center text-md-left">
                                <p class="text-muted">Bill To</p>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <ul class="px-0 list-unstyled">
                                    <li class="text-bold-800">Customer Name : {{$all[0]->customer_name}}</li>
                                    <li>Contact No : {{$all[0]->customer_contact_no}}</li>
                                    <li>Address : {{$all[0]->customer_add}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <p><span class="text-muted">Invoice Date :</span>

                                    @php

                                        $date = date_create($all[0]->created_at);

                                        echo date_format($date,'d-M-Y');

                                    @endphp

                                </p>
                            </div>
                        </div>
                        <!--/ Invoice Customer Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-2">
                            <div class="row">
                                <div class="table-responsive col-sm-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item & Description</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($all as $one)

                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <p>{{$one->product_name}}</p>
                                                <p class="text-muted">{{$one->product_description}}</p>

                                                @if($one->imei != null)
                                                    <p class="text-muted">IMEI : {{$one->imei}}</p>
                                                @endif
                                                @if($one->color != null)
                                                    <p class="text-muted">Color : {{$one->color}}</p>
                                                @endif
                                            </td>
                                            <td class="text-right">{{$one->sale_quantity}}</td>
                                            <td class="text-right">{{$one->retail_rate}}</td>
                                            <td class="text-right invoice-amount">{{$one->sale_quantity * $one->retail_rate}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-sm-12 text-center text-md-left">
                                    <p class="lead">Payment Methods:</p>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-borderless table-sm">
                                                <tbody>

                                                @if($all[0]->transaction_id != null)
                                                    <tr>
                                                        <td>Payment By :</td>
                                                        <td class="text-right">bKash</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Transaction : </td>
                                                        <td class="text-right">{{$all[0]->transaction_id}}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>Payment By :</td>
                                                        <td class="text-right">Cash</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <p class="lead">Total</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Total</td>
                                                <td class="text-right" id="total_amount"></td>
                                            </tr>
                                            <tr>
                                                <td>Paid</td>
                                                <td class="text-right">{{$all[0]->receive_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Due</td>
                                                <td class="text-bold-800 text-right">{{$all[0]->due_amount}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-center">
                                        <p>Authorized person</p>
                                        <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100"/>
                                        <h6>Amanda Orton</h6>
                                        <p class="text-muted">Managing Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div id="invoice-footer">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <h6>Terms & Condition</h6>
                                    <p>You know, being a test pilot isn't always the healthiest business in the world. We predict too much for the next year and yet far too little for the next 10.</p>
                                </div>
                                <div class="col-md-5 col-sm-12 text-center">
                                    <button type="button" class="btn btn-primary btn-lg my-1"><i class="fa fa-paper-plane-o"></i> Send Invoice</button>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Footer -->

                    </div>
                </section>
            </div>
        </div>
    </div>

    @endsection


@section('scripts')

    <script>

        sum=0;

        var a= $('.invoice-amount');
        //console.log(a);
        a.each(function (inx, cv) {
            //console.log(cv);
            sum+=parseInt($(cv).text());
            //console.log(sum);
            $('#total_amount').text(sum);
        });

    </script>

    @endsection