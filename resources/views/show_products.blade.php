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
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>quantity</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @php

                                                //dd($products);
                                                $serial = 0;
                                            @endphp
                                            @foreach($products as $data)
                                                @php
                                                    $serial++;
                                                @endphp
                                                    <tr>
                                                        <td>{{$serial}}</td>
                                                        <td>{{$data->product_name}}</td>
                                                        <td>{{ App\Category::find($data->category_id)->category_name }}</td>
                                                        <td>
                                                            @if($data->brand_id != null)
                                                            @php $brand= App\Brand::find($data->brand_id);

                                                            echo $brand->brand_name;

                                                            @endphp
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($data->quantity == null)
                                                                {{get_total_products($data->product_name)}}
                                                            @else
                                                                {{$data->quantity}}
                                                            @endif
                                                        </td>

                                                        <td>

                                                            @if($data->quantity == null)

                                                            <a href="{{url('/unique_items/'.$data->product_name)}}" type="button"
                                                                    class="btn btn-sm btn-primary btn-circle ">
                                                                <i class="fa fa-folder-open"></i>
                                                            </a>

                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-sm btn-primary btn-circle "
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModal{{$data->id}}">
                                                                    <i class="fa fa-list"></i>
                                                                </button>

                                                                <button type="button"
                                                                        class="btn btn-sm btn-warning btn-circle "
                                                                        data-toggle="modal"
                                                                        data-target="#deleteModal{{$data->id}}"><i
                                                                            class="fa fa-times"></i>
                                                                </button>
                                                            @endif

                                                        </td>
                                                    </tr>

                                            <div class="modal fade" id="SaleModal{{$data->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="icon-box" data-dismiss="modal"
                                                                 aria-label="Close">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </div>
                                                            <h4 class="modal-title">Are you sure?</h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you really want to sell these records?</p>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-dark"
                                                                    data-dismiss="modal" aria-label="Close">Cancel
                                                            </button>
                                                            <button class="btn btn-danger" id="{{$data->id}}" type="button" onclick="">Add To Sale
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form form-horizontal"
                                                                  action="{{route('products.update',$data->id)}}"
                                                                  method="post">
                                                                @method('PATCH') @csrf

                                                                <div class="form-body">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput1">Product Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput1"
                                                                                   class="form-control"
                                                                                   placeholder="Prodcut Name"
                                                                                   name="product_name"
                                                                                   value="{{$data->product_name}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Category </label>
                                                                        <div class="col-md-9">
                                                                            <select id="category" name="category_id" class="form-control" onclick="goToSubCategory(this.value)">
                                                                                @foreach($category as $sub)

                                                                                    <option value="{{$sub->id}}">{{$sub->category_name}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Sub Category </label>
                                                                        <div class="col-md-9">
                                                                            <select id="subCategory" name="category_id" class="form-control" onclick="goToBrands(this.value)">
                                                                                @foreach($sub_category as $sub)
                                                                                    <option value="
{{$sub->id}}">{{$sub->category_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Brand </label>
                                                                        <div class="col-md-9">
                                                                            <select id="product_brand" name="brand_id" class="form-control">

                                                                                @foreach($brands as $brand)
                                                                                    <option value="{{isset($brand->id)? $brand->id : ''}}">{{isset($brand->brand_name) ? $brand->brand_name : ''}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Supplier </label>
                                                                        <div class="col-md-9">
                                                                            <select id="supplier_id" name="supplier_id" class="form-control">                                                                                        @foreach($suppliers as $supplier)
                                                                                    <option value="{{$supplier->id}}"

                                                                                            @if($data->supplier_id == $supplier->id)
                                                                                            selected

                                                                                            @endif
                                                                                    >{{$supplier->supplier_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Purchase Rate</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput2"
                                                                                   class="form-control"
                                                                                   name="purchase_rate"
                                                                                   value="{{$data->purchase_rate}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Retail Rate</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput2"
                                                                                   class="form-control"
                                                                                   name="retail_rate"
                                                                                   value="{{$data->retail_rate}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Product Description</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput2"
                                                                                   class="form-control"
                                                                                   name="product_description"
                                                                                   value="{{$data->product_description}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">product imei </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput2"
                                                                                   class="form-control"
                                                                                   name="product_imei"
                                                                                   value="{{$data->product_imei}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 label-control"
                                                                               for="projectinput2">Color </label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" id="projectinput2"
                                                                                   class="form-control"
                                                                                   name="color"
                                                                                   value="{{$data->color}}">
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="form-actions">
                                                                    <button type="button" class="btn btn-warning mr-1"
                                                                            data-dismiss="modal" aria-label="Close">
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
                                                            <div class="icon-box" data-dismiss="modal"
                                                                 aria-label="Close">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <h4 class="modal-title">Are you sure?</h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you really want to delete these records? This process
                                                                cannot be
                                                                undone.</p>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <form action="{{route('products.destroy',$data->id)}}"
                                                                  method="POST">
                                                                {{ method_field('DELETE') }} @csrf

                                                                <button type="button" class="btn btn-dark"
                                                                        data-dismiss="modal" aria-label="Close">Cancel
                                                                </button>
                                                                <button class="btn btn-danger" type="submit">Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            </tbody>

                                            <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                {{--<th>Purchase</th>--}}
                                                {{--<th>Retail</th>--}}
                                                <th>quantity
                                                </th>
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