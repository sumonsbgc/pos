@extends('Template_file.master')

@section('title','Add Supplier')

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
                                <li class="breadcrumb-item active"><a href="#">Add Supplier</a>
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
                                    <h4 class="card-title" id="horz-layout-basic">Add Supplier</h4>
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
                                        <form class="form form-horizontal" action="{{route('supplier.store')}}" method="post">
                                            @csrf

                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput1">Supplier Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput1" class="form-control" placeholder="Supplier Name" name="supplier_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Company Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput2" class="form-control" placeholder="Company Name" name="company_name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Present Address</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput2" class="form-control" name="present_add">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Permanent Address</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput2" class="form-control" name="permanent_add">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput2">Mobile No</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput2" class="form-control" name="mobile_no">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput4">Phone No</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone_no">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="projectinput3" class="form-control" placeholder="E-mail" name="mail">
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