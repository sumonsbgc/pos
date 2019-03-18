@extends('Template_file.master')

@section('title', 'Invoice History')


@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">SHow Products</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Show Products</h4>
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
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered zero-configuration" id="example">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Receipt No</th>
                                                <th>Customer Name</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @php

                                                    $id = 0;

                                                @endphp
                                                @foreach($all as $one)
                                                    @php

                                                        $id ++;

                                                    @endphp

                                                    <tr>
                                                        <td>{{$id}}</td>
                                                        <td>{{$one->receipt_no}}</td>
                                                        <td>{{$one->customer_name}}</td>
                                                        <td>{{$one->created_at}}</td>
                                                        <td><a href="{{url('/product_invoice/'.$one->receipt_no)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>


                                                    </tr>


                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Receipt No</th>
                                                <th>Customer Name</th>
                                                <th>Date</th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>


    @endsection