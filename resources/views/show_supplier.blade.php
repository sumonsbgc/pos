@extends('Template_file.master') 
@section('title','All Suppliers') 
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
                            <li class="breadcrumb-item active"><a href="#">All Suppliers</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-basic">Supplier Info</h4>
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
                                                <th>Supplier Name</th>
                                                <th>Company Name</th>
                                                <th>Mobile No</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php $id=0; 
@endphp @foreach($all as $data) @php $id++; 
@endphp


                                            <tr>
                                                <td>{{$id}}</td>
                                                <td>{{$data->supplier_name}}</td>
                                                <td>{{$data->company_name}}</td>
                                                <td>{{$data->mobile_no}}</td>

                                                <td>
                                                    <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#exampleModalf{{$data->id}}">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>

<<<<<<< HEAD
                                                        <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#history{{$data->id}}">
                                                            <i class="ft-clock"></i>
=======
                                                    <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                            <i class="fa fa-list"></i>
                                                        </button>

                                                    <button type="button" class="btn btn-primary btn-circle " data-toggle="modal" data-target="#history{{$data->id}}">
                                                            <i class="fa fa-bar-chart"></i>
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
                                                        </button>

                                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#del{{$data->id}}"><i
                                                                    class="fa fa-times"></i>
                                                        </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModalf{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title d-inline-block" id="myModalLabel19">Details</h4>
                                                            <button type="button" class="close cls-btn" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php $purchase_data_history = get_suppliers_data($data->id) 
@endphp
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p>Present Address: </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>{{$data->present_add}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p>Permanent Address: </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p>{{$data->permanent_add}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5>Purchase History</h5>
                                                                </div>
                                                            </div>

                                                            @if($purchase_data_history != null)
                                                            <div class="custom-table p-1">

                                                                <div class="row">
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Date</p>
                                                                    </div>
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Total </p>
                                                                    </div>
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Cash Paid</p>
                                                                    </div>
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Due</p>
                                                                    </div>
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Pay</p>
                                                                    </div>
                                                                    <div class="col-2 t-head align-self-center">
                                                                        <p>Action</p>
                                                                    </div>
                                                                </div>

                                                                @foreach($purchase_data_history as $datum)


                                                                <div class="row">
                                                                    <div class="col-2 t-c">
                                                                        @php $a= $datum->created_at; echo date_format($a,'d-M-Y'); 
@endphp
                                                                    </div>
                                                                    <div class="col-2 t-c">{{$datum->total_amount}}</div>
                                                                    <div class="col-2 t-c" id="cash_purchase{{$datum->id}}">{{$datum->cash_purchase}}</div>
                                                                    <div class="col-2 t-c" id="credit_purchase{{$datum->id}}">{{$datum->credit_purchase}}</div>
                                                                    <div class="col-2 t-c">
                                                                        <input type="number" class="form-control" name="paid" id="paid{{$datum->id}}">
                                                                    </div>
                                                                    <div class="col-2 t-c">

                                                                        @if($datum->credit_purchase != 0)

                                                                        <button type="submit" class="btn btn-primary" id="{{$datum->id}}" onclick="change_credit(this.id)">Add</button>                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                @endforeach
                                                            </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

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
                                                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                                                            <i class="ft-x"></i> Cancel
                                                                        </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                            <i class="fa fa-check-square-o"></i>Update
                                                                        </button>
                                                                </div>
                                                            </form>


                                                 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

<<<<<<< HEAD
                                                @if(Session::has('message2'))

                                                    <div id="updateModal" class="modal fade show">
                                                        <div class="modal-dialog modal-upload">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa fa-check"></i>
                                                                    </div>
                                                                    <h4 class="modal-title">Great!</h4>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Your data has been updated successfully</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="modal fade" id="history{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title d-inline-block mt-2" id="myModalLabel19">History</h4>
                                                                <button type="button" class="close cls-btn" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <span>Transaction History Of {{$data->supplier_name}}</span>

                                                                @php

                                                                    $histories = get_suppliers_history($data->id);

                                                                @endphp
=======
                                            @if(Session::has('message1'))
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

                                            <div id="updateModal" class="modal fade show">
                                                <div class="modal-dialog modal-upload">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <h4 class="modal-title">Great!</h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Your data has been updated successfully</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="modal fade" id="history{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title d-inline-block" id="myModalLabel19">Details</h4>
                                                            <button type="button" class="close cls-btn" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            @php $histories = get_suppliers_history($data->id); 
                                                            @endphp @if($histories != null)



                                                            <div class="custom-table p-1">

                                                                <div class="row">
                                                                    <div class="col-4 t-head align-self-center">
                                                                        <p>Date</p>
                                                                    </div>
                                                                    <div class="col-4 t-head align-self-center">
                                                                        <p>Cash Paid</p>
                                                                    </div>
                                                                    <div class="col-4 t-head align-self-center">
                                                                        <p>Purchase Date</p>
                                                                    </div>
                                                                </div>

                                                                @foreach($histories as $datum)


                                                                <div class="row">
                                                                    <div class="col-4 t-c">
                                                                        @php $a= $datum->created_at; echo date_format($a,'d-M-Y'); 
@endphp
                                                                    </div>
                                                                    <div class="col-4 t-c">{{$datum->paid}}</div>
                                                                    <div class="col-4 t-c">

                                                                        @php $purchase_date = get_suppliers_purchase_date($datum->purchase_id); $p_date = date_create($purchase_date->created_at);
                                                                        echo date_format($p_date, 'd-M-Y') 
@endphp

                                                                    </div>
                                                                    {{--
                                                                    <div class="col-2 t-c" id="credit_purchase{{$datum->id}}">{{$datum->credit_purchase}}</div>--}} {{--
                                                                    <div class="col-2 t-c">--}} {{--
                                                                        <input type="number" class="form-control" name="paid" id="paid{{$datum->id}}">--}}
                                                                        {{--
                                                                    </div>--}} {{--
                                                                    <div class="col-2 t-c">--}} {{--@if($datum->credit_purchase != 0)--}} {{--

                                                                        <button type="submit" class="btn btn-primary" id="{{$datum->id}}" onclick="change_credit(this.id)">Add</button>--}}
                                                                        {{--@endif--}} {{--
                                                                    </div>--}}
                                                                </div>

                                                                @endforeach
                                                            </div>

                                                            @endif

<<<<<<< HEAD
                                                                                </div>
                                                                            </div>
=======
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="del{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content modal-lg">
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

                                                            <form action="{{route('supplier.destroy',$data->id)}}" method="POST">
                                                                {{ method_field('DELETE') }} @csrf
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

                                                                <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Cancel</button>
                                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                            </form>


                                               
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

<<<<<<< HEAD



                                                <div class="modal fade" id="del{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-confirm">
                                                        <div class="modal-content modal-lg">
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
=======
                                            @endforeach
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

                                            
                                                         
                                            @if(Session::has('message2'))

                                            <div id="deleteModal" class="modal fade show">
                                                <div class="modal-dialog modal-upload">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <h4 class="modal-title">Great!</h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Your data has been deleted successfully</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                                        </div>
                                                    </div>
                                                </div>
<<<<<<< HEAD
                                            @endforeach

                                            @if(Session::has('message3'))

                                                <div id="deleteModal" class="modal fade show">
                                                    <div class="modal-dialog modal-upload">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div class="icon-box" data-dismiss="modal" aria-label="Close">
                                                                    <i class="fa fa-remove"></i>
                                                                </div>
                                                                <h4 class="modal-title">Great!</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Your data has been deleted successfully</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            </tbody>
=======
                                            </div>
                                            @endif
                                        </tbody>
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59


                                        <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Supplier Name</th>
                                                <th>Company Name</th>
                                                <th>Mobile No</th>
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
 
@section('scripts')

<<<<<<< HEAD
    @if(Session::has('message4'))
    <script>swal("Warning!", "This Supplier Have Some Records in Products", "warning")</script>

    @elseif(Session::has('message3'))
        <script>swal("Delete!", "Successfully Deleted This Supplier", "success")</script>
    @endif


    <script>

        function change_credit(id) {
=======
<script>
    function change_credit(id) {
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

            var purchase_id = id;


            var paid = $('#paid'+id).val();

            var cash = $('#cash_purchase'+id);

            var credit = $('#credit_purchase'+id);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/purchase_history')}}",
                type: 'POST',
                data :{
                    'purchase_id' : purchase_id,
                    'paid' : paid
                },
                success: function (response) {

                    cash.text(response[0]);
                    credit.text(response[1]);

                },

            })

        }
</script>


<script>
        @if(Session::has('message1'))
                $('#updateModal').modal('show');
            @endif
            $('#updateModal').delay(2000).fadeOut('slow') 
            setTimeout(function(){
              $('#updateModal').modal('hide')
    }, 2500);
    // $('#successModal').delay(2000).fadeOut('slow');
    
    </script>
<<<<<<< HEAD

    @endsection

@section('scripts')


    <script>
        @if(Session::has('message2'))
        $('#updateModal').modal('show');
        @endif
        $('#updateModal').delay(2000).fadeOut('slow')
        setTimeout(function(){
            $('#updateModal').modal('hide')
        }, 2500);
        // $('#successModal').delay(2000).fadeOut('slow');
    </script>

    <script>
        @if(Session::has('message3'))
=======
    
    <script>
        @if(Session::has('message2'))
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
        $('#deleteModal').modal('show');
        @endif
        $('#deleteModal').delay(2000).fadeOut('slow')
        setTimeout(function(){
            $('#deleteModal').modal('hide')
<<<<<<< HEAD
        }, 2500);
        // $('#successModal').delay(2000).fadeOut('slow');
    </script>

    <script>
        @if(Session::has('message4'))
        $('#warning').modal('show');
        @endif
        $('#warning').delay(2000).fadeOut('slow')
        setTimeout(function(){
            $('#warning').modal('hide')
        }, 2500);
        // $('#successModal').delay(2000).fadeOut('slow');
    </script>
@endsection
=======
        },2500);
    
    </script>
@endsection
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
