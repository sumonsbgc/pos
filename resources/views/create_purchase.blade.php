@extends('Template_file.master')

@section('title','Create Purchase')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Create Purchase</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Page</a>
                                </li>
                                <li class="breadcrumb-item active">Create Purchase
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
                                        <form action="{{route('store_purchase_notes')}}" method="post" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                                            @csrf
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="date1">Product Details</label>
                                                            <textarea type="text" class="form-control" id="product_details" name="product_details"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Select Supplier</label>
                                                            <select id="projectinput5" name="supplier_id" class="form-control">
                                                                @foreach($allSupplier as $supplier)
                                                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date1">Transaction Type</label>
                                                            <input type="text" class="form-control" id="date1" name="transaction_type">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="date1">Total Amount</label>
                                                            <input type="number" class="form-control" id="total_amount" name="total_amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="date1">Paid Amount</label>
                                                            <input type="number" class="form-control" id="cash_purchase" name="cash_purchase" onkeyup="for_due(this.value)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="date1">Due Amount</label>
                                                            <input type="number" class="form-control" id="credit_purchase" name="credit_purchase" disabled>
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
    $('successModal').modal('show');

    @endif
    $('successModal').delay(4000).fadeOut('slow');
    // setTimeout(function()){
    //     $('$successModal').modal('hide')
    // },2500);

    function for_due(value) {

        var cash = value;

        var total = $('#total_amount').val();

        var due = total - cash;

        $('#credit_purchase').val(due);

    }


    </script>

    @endsection