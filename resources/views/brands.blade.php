@extends('Template_file.master') 
@section('title', 'Product Brand') 
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Brand List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Product Brand
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
                    <div class="col-sm-10 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Product Brand</h4>
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
                                <form class="form-simple brand-form" action="{{route('brands.store')}}" method="post">
                                    @csrf

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber1">Select Category</label>
                                                    <select id="projectinput5" name="category_id" class="form-control" onchange="goToSubCategory(this.value)">
                                                        @foreach($category as $mainCategory)
                                                        <option value="{{$mainCategory->id}}">{{$mainCategory->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber1">Select Sub-Category</label>
                                                    <select id="subCategory" name="category_id" class="form-control">
                                                        @foreach($sub_category as $sub)
                                                        <option value="{{$sub->id}}">{{$sub->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="user-name" name="brand_name" placeholder="Brand Name">
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg">Add</button>
                                </form>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Serial</th>
                                                <th>Brand Name</th>
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

                                            <tr class="text-center">
                                                <td>{{$id}}</td>
                                                <td>{{$data->brand_name}}</td>
                                                <td class="text-center action_data">
                                                    <button type="button"  class="btn btn-primary btn-circle " data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                        <i class="fa fa-list"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#deleteModal{{$data->id}}" ><i
                                                            class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                           
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="{{route('brands.update',$data->id)}}" method="POST">
                                                                @method('PATCH') @csrf
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="category" value="{{$data->brand_name}}" name="brand_name" class="form-control">
                                                                </div>

                                                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="submit"><strong>Update</strong></button>
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
                                                            <p>Do you really want to delete these records? This process cannot
                                                                be undone.</p>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form action="{{route('brands.destroy',$data->id)}}" method="POST">
                                                                {{ method_field('DELETE') }} @csrf
                                                                <button type="button" class="btn btn-info" data-dismiss="modal" >Cancel</button>
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
                                                <th>Brand Name</th>
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