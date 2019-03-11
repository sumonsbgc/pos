@extends('Template_file.master')

@section('title','Show Purchase Notes')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Invoice Template</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Product Purchase</a>
                                </li>
                                <li class="breadcrumb-item active">All Purchase List
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
            @foreach($all as $single)

            <div class="content-body"><section class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Purchase Notes</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Customer Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-12 text-center text-md-left">
                                <p class="text-muted">Bill From</p>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-left">
                                <ul class="px-0 list-unstyled">
                                    <li class="text-bold-800">{{$single->supplier_name}}</li>
                                    <li>{{$single->company_name}},</li>
                                    <li>{{$single->present_add}},</li>
                                    <li>{{$single->mobile_no}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-right">
                                <p><span class="text-muted">Invoice Date :</span>

                                    {{$single->created_at}}

                                </p>
                            </div>
                        </div>
                        <!--/ Invoice Customer Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-2">
                            <div class="row">

                                @php
                                printf(html_entity_decode($single->product_details));
                                @endphp

                            </div>
                            <div class="row">
                                <div class="offset-md-7 col-md-5 col-sm-12">
                                    <p class="lead">Total Amount</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Total</td>
                                                <td class="text-right">{{$single->total_amount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Paid Amount</td>
                                                <td class="text-right">{{$single->cash_purchase}}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-bold-800">Due Amount</td>
                                                <td class="text-bold-800 text-right">
                                                    @php
                                                    $due = $single->total_amount - $single->cash_purchase;
                                                    echo $due;
                                                    @endphp

                                                    {{-- {{$single->credit_purchase}} --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payment Transaction By</td>
                                                <td class="pink text-right">{{$single->transaction_type}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endforeach

            {{$all->links()}}
        </div>
    </div>

    @endsection