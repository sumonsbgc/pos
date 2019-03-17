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

            {{--@if(Session::has('message'))--}}
                {{--<div class="alert alert-primary alert-dismissible fade show notification" role="alert">--}}
                    {{--<strong>Hello {{Auth::user()->name}}!</strong> Customer Created Successfully.--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if(Session::has('update'))--}}
                {{--<div class="alert alert-primary alert-dismissible fade show notification" role="alert">--}}
                    {{--<strong>Hello {{Auth::user()->name}}!</strong> Expenses Updated Successfully.--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--@endif--}}



            <div class="modal fade" id="exampleModal" tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <form class="form form-horizontal" action="{{route('customers.store')}}" method="post">
                                @csrf

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput1">Customer Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput1" class="form-control" placeholder="Customer Name" name="customer_name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">Mobile No</label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput2" class="form-control" name="mobile_no" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">Phone No</label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput2" class="form-control" name="phone_no" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">Mail</label>
                                        <div class="col-md-9">
                                            <input type="email" id="projectinput2" class="form-control" name="mail" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput2">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" id="projectinput2" class="form-control" name="address" value="">
                                        </div>
                                    </div>

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
                                                    <td>
                                                        @php
                                                            echo $due = customer_total_due($customer->id);
                                                        @endphp
                                                    </td>
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
                                                                data-target="#update{{$customer->id}}"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-backdrop="false"
                                                                data-target="#del{{$customer->id}}"><i class="fa fa-remove"></i></button>
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

                                                                                    @if($datum->due_amount != 0)

                                                                                        <button type="button" class="btn btn-primary" id="{{$datum->id}}" onclick="sale_due(this.id)">Add</button>
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

                                                <div class="modal fade" id="update{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                                                            </div>
                                                            <div class="modal-body">

                                                                <form class="form form-horizontal" action="{{route('customers.update',$customer->id)}}" method="post">
                                                                    @method('PATCH')
                                                                    @csrf

                                                                    <div class="form-body">
                                                                        <div class="form-group row">
                                                                            <label class="col-md-3 label-control" for="projectinput1">Customer Name</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="projectinput1" class="form-control" placeholder="Supplier Name" name="customer_name" value="{{$customer->customer_name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-md-3 label-control" for="projectinput2">Mobile No</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="projectinput2" class="form-control" placeholder="Company Name" name="mobile_no" value="{{$customer->mobile_no}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-md-3 label-control" for="projectinput2">Phone No</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="projectinput2" class="form-control" name="phone_no" value="{{$customer->phone_no}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-md-3 label-control" for="projectinput2">Mail</label>
                                                                            <div class="col-md-9">
                                                                                <input type="email" id="projectinput2" class="form-control" name="mail" value="{{$customer->mail}}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label class="col-md-3 label-control" for="projectinput2">Address</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" id="projectinput2" class="form-control" name="address" value="{{$customer->address}}">
                                                                            </div>
                                                                        </div>

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

                                                <div class="modal fade" id="del{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-confirm">
                                                        <div class="modal-content modal-lg">
                                                            <div class="modal-header">
                                                                <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-times"></i>
                                                                </div>
                                                                <h4 class="modal-title">Are you sure?</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you really want to delete these records? This process cannot
                                                                    be undone.</p>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <form action="{{route('customers.destroy',$customer->id)}}" method="POST">
                                                                    {{ method_field('DELETE') }} @csrf

                                                                    <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                                </form>
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


@section('scripts')

    @if(Session::has('deleted'))
        <script>swal("Good job!", "You clicked the button!", "success")</script>
        {{--@php session()->flash('delete') @endphp--}}
    @elseif(Session::has('delete'))
        <script>swal("Warning!", "This Customer Have some records in sell list. You Cannot delete this customer","warning")</script>
        {{--@php session()->flash('deleted') @endphp--}}
    @elseif(Session::has('update'))
        <script>swal("Success!", "Customer Updated Successfully!", "info")</script>
    @elseif(Session::has('message'))
        <script>swal("Success!", "Customer Created Successfully!", "success")</script>
    @endif


    <script>

        function sale_due(id) {

            var sale_id = id;

            var paid = $('#paid'+id).val();

            var cash = $('#receive_amount'+id);

            var credit = $('#due_amount'+id);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/pay_due_amount')}}",
                type: 'POST',
                data :{
                    'sale_id' : sale_id,
                    'paid' : paid
                },
                success: function (response) {
                    cash.text(response[0]);
                    credit.text(response[1]);
                },

            })

        }

    </script>

    @endsection