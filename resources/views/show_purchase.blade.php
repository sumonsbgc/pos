@extends('Template_file.master')

@section('title','Show Purchase Notes')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">All Sales</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Sales</a>
                                </li>
                                <li class="breadcrumb-item active">Show All Sale
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
        
            </div>
         

            <div class="content-body"><section class="card">
                    <div class="card-header">
                        <h4 class="card-title">Show All Sales</h4>
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
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>SL</th>                          
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product IMEI</th>
                                    <th>Color</th>                          
                                    <th>Action</th>
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

                                    <tr>
                               
                                    <td>{{$id}}</td>
                                    <td>{{$data->product_name}}</td>
                                    <td>{{$data->product_description}}</td>
                                    <td>{{$data->product_imei}}</td>
                                    <td>{{$data->color}}</td>
                                   

                                        <td>                  
                                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i
                                                        class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                                <div id="deleteModal{{$data->id}}" class="modal fade">
                                    <div class="modal-dialog modal-confirm">
                                        <div class="modal-content">
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

                                                <form action="{{url('show_sales_destroy',$data->id)}}" method="POST">
                                                    {{ method_field('DELETE') }} @csrf

                                                    <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                                <tfoot>
                                <tr>
                                    <th>SL</th>                          
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product IMEI</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
          

        </div>
    </div>

    @endsection