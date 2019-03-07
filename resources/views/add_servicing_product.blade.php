@extends('Template_file.master')
@section('title','Add Servicing Products')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    {{-- <h3 class="content-header-title mb-0">Add Products</h3> --}}
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Page</a>
                                </li>
                                <li class="breadcrumb-item active">Add Servicing Products
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Servicing Product Form</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @php
                                                $id=0;
                                                @endphp
                                                @foreach ($errors->all() as $error)
                                                @php
                                                $id++;
                                                @endphp
                                                    <li>{{$id}}.{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <form action="{{route('servicing.store')}}" method="post" class="number-tab-steps wizard-circle">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Customer Name</label>
                                                            <input type="text" class="form-control" id="date1" name="customer_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Address</label>
                                                            <input type="text" class="form-control" id="date1" name="address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Mobile</label>
                                                            <input type="text" class="form-control" id="date1" name="mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Product Name</label>
                                                            <input type="text" class="form-control" id="date1" name="product_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Service Charge</label>
                                                            <input type="text" class="form-control" id="date1" name="service_charge">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="date1">Paid</label>
                                                            <input type="text" class="form-control" id="date1" name="paid">
                                                        </div>
                                                    </div>
                                                 
                                                  
                                                    <div class="col-md-12 ">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection