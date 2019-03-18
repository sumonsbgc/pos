@extends('Template_file.master')

@section('title','Sold Products')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Sold List</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Sold List
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sold Product List</h4>
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
                                <div class="card-form-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @php $id=0;
                                                @endphp @foreach ($errors->all() as $error) @php $id++;
                                                @endphp
                                                <li>{{$id}}.{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr class="text-center">
                                                <th>Serial</th>
                                                <th>Receipt No</th>
                                                <th>Product Name</th>
                                                <th>Sale Quantity</th>
                                                <th>Retail Rate</th>
                                                <th>Total Amount</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @php
                                                $id=0;
                                            @endphp
                                            @foreach($all as $data)
                                                @php
                                                    $id++;
                                                @endphp

                                            <tr class="text-center">
                                                <td>{{$id}}</td>
                                                <td>{{$data->product_name}}</td>
                                                <td>{{$data->receipt_no}}</td>
                                                <td>{{$data->sale_quantity}}</td>
                                                <td>{{$data->retail_rate}}</td>
                                                <td>{{$data->retail_rate * $data->sale_quantity}}</td>
                                                <td>
                                                    @php
                                                        $date = date_create($data->created_at);
                                                        echo date_format($date,'d-M-Y');
                                                    @endphp
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Receipt No</th>
                                                <th>Product Name</th>
                                                <th>Sale Quantity</th>
                                                <th>Retail Rate</th>
                                                <th>Total Amount</th>
                                                <th>Date</th>
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