@extends('Template_file.master') 
@section('title','Show Products') 
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
                                                <th>Serial</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Suppliers</th>
                                                <th>Description</th>
                                                <th>IEMI</th>
                                                <th>Purchase Rate</th>
                                                <th>Retail Rate</th>
                                                <th>Color</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                               $id=0; 
                                            @endphp
                                      @foreach($product as $data) 
                                            @php
                                               $id++; 
                                            @endphp
                                            <tr>
                                                <td>{{$id}}</td>
                                                <td>{{$data->product_name}}</td>
                                                <td>{{$data->category_name}}</td>
                                                <td>{{$data->brand_name}}</td>
                                                <td>{{$data->supplier_name}}</td>
                                                <td>{{$data->product_description}}</td>
                                                <td>{{$data->product_imei}}</td>
                                                <td>{{$data->purchase_rate}}</td>
                                                <td>{{$data->retail_rate}}</td>
                                                <td>{{$data->color}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-circle pull-left">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>

                                                    <button type="button" class="btn btn-primary btn-circle pull-left" data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                            <i class="fa fa-list"></i>
                                                        </button>

                                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i
                                                                    class="fa fa-times"></i>
                                                        </button>
                                                </td>
                                            </tr>
                                        </tbody>

                                        {{--
                                        <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form form-horizontal" action="{{route('supplier.update',$data->id)}}" method="post">
                                                            @method('PATCH') @csrf

                                                            <div class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput1">Supplier Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Supplier Name" name="supplier_name" value="{{$data->supplier_name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Company Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Company Name" name="company_name" value="{{$data->company_name}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Present Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="present_add" value="{{$data->present_add}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Permanent Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="permanent_add" value="{{$data->permanent_add}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Mobile No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="mobile_no" value="{{$data->mobile_no}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput4">Phone No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone_no" value="{{$data->phone_no}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                                    <div class="col-md-9">
                                                                        <input type="email" id="projectinput3" class="form-control" placeholder="E-mail" name="mail" value="{{$data->mail}}">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-actions">
                                                                <button type="button" class="btn btn-warning mr-1">
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
                                                        <p>Do you really want to delete these records? This process cannot be
                                                            undone.</p>
                                                    </div>
                                                    <div class="modal-footer">

                                                        <form action="{{route('supplier.destroy',$data->id)}}" method="POST">
                                                            {{ method_field('DELETE') }} @csrf

                                                            <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                         @endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Suppliers</th>
                                                <th>Description</th>
                                                <th>IEMI</th>
                                                <th>Purchase Rate</th>
                                                <th>Retail Rate</th>
                                                <th>Color</th>
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
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection