@extends('Template_file.master')

@section('title','Sales Entry')

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
                                <li class="breadcrumb-item active"><a href="#">Sales Entry</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Borderless table</h4>
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
                            <div class="card-content">
                                <div class="table-responsive p-1">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Per Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $sl =0
                                        @endphp

                                        @if($products != null)
                                        @foreach($products as $product)

                                            @php
                                                $sl++
                                            @endphp

                                        <tr>
                                            <td>{{$sl}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td width="350px">
                                                @php

                                                echo "Description: ". $product->product_description."<br>";

                                                if ($product->color !=null){
                                                    echo "Color :".$product->color."<br>";
                                                }
                                                if ($product->product_imei != null){
                                                    echo "IMEI :".$product->product_imei."<br>";
                                                }
                                                @endphp
                                            </td>
                                            <td width="80px">
                                                <input type="number" class="form-control quantity_input" id="{{$product->id}}" value="1">

                                            </td>
                                            <td width="120px"><input type="number" id="retail_rate{{$product->id}}" class="form-control retail_price" value="{{$product->retail_rate}}"></td>
                                            <td>

                                                <script>
                                                    var i= document.getElementById('{{$product->id}}').value;
                                                    var b= document.getElementById('retail_rate{{$product->id}}').value;

                                                    var total  = i*b;

                                                    window.document.write(total);

                                                    console.log(total);
                                                </script>

                                            </td>
                                        </tr>
                                            @endforeach

                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive p-1">
                                    <table class="table mb-0">
                                        <tbody>
                                        <td width="85%" class="text-right" style="font-weight: 700;">Total Amount :</td>
                                        <td width="15%" class="text-right" style="font-weight: 700;">20000</td>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body-btn p-1 text-right">
                                    <button class="btn btn-warning">Remove All</button>
                                    <button class="btn btn-success">Sell</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection