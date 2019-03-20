@extends('Template_file.master')
@section('title','Add Products')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Add Products</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Page</a>
                                </li>
                                <li class="breadcrumb-item active">Add Products
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
                                    <h4 class="card-title">Add Products Form</h4>
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
                                        <form action="{{route('products.store')}}" method="post" class="number-tab-steps wizard-circle">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="date1">Product Name</label>
                                                            <input type="text" class="form-control" id="date1" name="product_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Select Category</label>
                                                            <select id="projectinput5" name="category_id" class="form-control" onclick="goToSubCategory(this.value);goToBrands(this.value)">
                                                                @foreach($category as $mainCategory)
                                                                    <option value="{{$mainCategory->id}}">{{$mainCategory->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Select Sub-Category</label>
                                                            <select id="subCategory" name="category_id" class="form-control" onclick="goToBrands(this.value)">
                                                                @foreach($sub_category as $sub)
                                                                    <option value="{{$sub->id}}">{{$sub->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Select Brand</label>
                                                            <select id="product_brand" name="brand_id" class="form-control">
                                                                @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Select Supplier</label>
                                                            <select id="projectinput5" name="supplier_id" class="form-control">
                                                                @foreach($suppliers as $supplier)
                                                                    <option                            value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="date1">Product Description</label>
                                                            <textarea class="form-control" name="product_description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date1">Product IMEI*1</label>
                                                            <input type="text" class="form-control" id="date1" name="imei_1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date1">Product IMEI*2</label>
                                                            <input type="text" class="form-control" id="date1" name="imei_2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date1">Purchase Rate</label>
                                                            <input type="text" class="form-control" id="date1" name="purchase_rate">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date1">Retail Rate</label>
                                                            <input type="text" class="form-control" id="date1" name="retail_rate">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date1">Product Quantity</label>
                                                            <input type="text" class="form-control" id="date1" name="quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date1">Color</label>
                                                            <input type="text" class="form-control" id="date1" name="color">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="date1">Note</label>
                                                            <textarea name="notes" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" class="btn btn-primary">ADD</button>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </form>

                                        @if(Session::has('message'))

                                        <div id="successModal" class="modal fade show">
                                            <div class="modal-dialog modal-upload">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <h4 class="modal-title">Great!</h4>
        
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Your data has been uploaded successfully</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
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

@section('scripts')
<script>
    @if(Session::has('message'))
            $('#successModal').modal('show');
        @endif
        $('#successModal').delay(2000).fadeOut('slow') 
        setTimeout(function(){
          $('#successModal').modal('hide')
}, 2500);
// $('#successModal').delay(2000).fadeOut('slow');
</script>
@endsection