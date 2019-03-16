@extends('Template_file.master')


@section('title','Customer')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">All Customers</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">All Customers
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mb-2 float-right" data-toggle="modal" data-backdrop="false"
                    data-target="#exampleModal">
                <i class="ft-plus"></i>Add New Customer
            </button>

            <div class="clearfix"></div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('message'))
                <div class="alert alert-primary alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Created Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(Session::has('update'))
                <div class="alert alert-primary alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(Session::has('delete'))
                <div class="alert alert-warning alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Deleted Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="modal fade" id="exampleModal" tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <form class="form form-horizontal" action="{{route('expenses.store')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purpose
                                        <span class="danger"> *</span>
                                    </label>
                                    <input class="form-control" name="purpose" placeholder="Purpose">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount
                                        <span class="danger"> *</span>
                                    </label>
                                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="content-body">
                <!-- Zero configuration table -->

                <section id="configuration">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Expenses</h4>
                                    <a class="heading-elements-toggle"><i
                                                class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Mail</th>
                                                <th>Due Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @php
                                                $serial = 0;
                                            @endphp

                                            @foreach($allCustomer as $customer)

                                                <tr>
                                                    <td>{{$serial++}}</td>
                                                    <td>{{$customer->customer_name}}</td>
                                                    <td>{{$customer->mobile_no}}</td>
                                                    <td>{{$customer->mail}}</td>
                                                    <td>{{$customer->mail}}</td>
                                                    <td>
                                                        @php

                                                            $create_date = date_create($customer->created_at);

                                                            echo date_format($create_date,'d-M-Y');

                                                        @endphp
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-backdrop="false"
                                                                 data-target="#pay{{$customer->id}}">Pay</button>
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-backdrop="false"
                                                                data-target="#exampleModal"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="false"
                                                                data-target="#exampleModal"><i class="fa fa-remove"></i></button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="pay{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title d-inline-block" id="myModalLabel19">Details</h4>
                                                                <button type="button" class="close cls-btn" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @php
                                                                    $customers_info = get_customers_data($customer->id);

                                                                @endphp
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h5>Purchase History</h5>
                                                                    </div>
                                                                </div>

                                                                @if($customers_info != null)
                                                                    <div class="custom-table p-1">

                                                                        <div class="row">
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Product Name </p>
                                                                            </div>
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Total </p>
                                                                            </div>
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Cash Paid</p>
                                                                            </div>
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Due</p>
                                                                            </div>
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Pay</p>
                                                                            </div>
                                                                            <div class="col-2 t-head align-self-center">
                                                                                <p>Action</p>
                                                                            </div>
                                                                        </div>

                                                                        @foreach($customers_info as $datum)



                                                                            <div class="row">
                                                                                <div class="col-2 t-c">
                                                                                    @php
                                                                                        $product = \App\Product::where('id',$datum->product_id)->first()->product_name;
                                                                                    echo $product;
                                                                                    @endphp
                                                                                </div>
                                                                                <div class="col-2 t-c">{{$datum->retail_rate}}</div>
                                                                                <div class="col-2 t-c" id="receive_amount{{$datum->id}}">{{$datum->receive_amount}}</div>
                                                                                <div class="col-2 t-c" id="due_amount{{$datum->id}}">{{$datum->due_amount}}</div>
                                                                                <div class="col-2 t-c">
                                                                                    <input type="number" class="form-control" name="paid" id="paid{{$datum->id}}">
                                                                                </div>
                                                                                <div class="col-2 t-c">

                                                                                    @if($datum->credit_purchase != 0)

                                                                                        <button type="submit" class="btn btn-primary" id="{{$datum->id}}" onclick="change_credit(this.id)">Add</button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                        @endforeach
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach


                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Mail</th>
                                                <th>Due Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>

    @endsection