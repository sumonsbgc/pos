@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('Template_file.master')
@section('title','All Users')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Account</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> Account
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-body">
                <!-- Zero configuration table -->

                <section id="configuration">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Filter</label>
                                                <select id="filter" class="form-control">
                                                    <option> Select One Option </option>
                                                    <option value="1">Today</option>
                                                    <option value="15">Last 15 Days</option>
                                                    <option value="30">Last 30 Days</option>
                                                    <option value="365">Last 365 Days</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <fieldset>
                                                    <h5>From
                                                        <span class="danger"> *</span>
                                                    </h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control date-inputmask"
                                                               id="from" name="from" placeholder="Enter Date">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-3">
                                                <fieldset>
                                                    <h5>To
                                                        <span class="danger"> *</span>
                                                    </h5>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control date-inputmask"
                                                               id="to" name="to" placeholder="Enter Date">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn mr-1 mt-2 btn-success" id="search"><i
                                                            class="fa fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table-->


                <section id="configuration">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="base-tab41" data-toggle="tab"
                                                   aria-controls="tab41" href="#tab41" role="tab" aria-selected="false">
                                                    Purchase History
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab42" data-toggle="tab"
                                                   aria-controls="tab42" href="#tab42" role="tab" aria-selected="false">
                                                    Sale History
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="base-tab43" data-toggle="tab"
                                                   aria-controls="tab43" href="#tab43" role="tab" aria-selected="true">
                                                    Expenses History
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content px-1 pt-1">
                                            <div class="tab-pane active show" id="tab41" role="tab"
                                                 aria-labelledby="base-tab41" aria-selected="false">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tab42" aria-labelledby="base-tab42">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tab43" aria-labelledby="base-tab43">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Username</th>
                                                        <th>Purpose</th>
                                                        <th>Amount</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>

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
        ;(function ($) {
            $(document).ready(function () {
                $('#filter').on('change',function (e) {

                    e.preventDefault();

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{url('/accountfilter')}}" + "/" + $(this).val(),
                        type: "POST",
                        success: function (response) {
                            alert(response);
                        },
                        error: function (msg) {
                            alert("ERROR");
                        }
                    });
                });


                $('#search').on('click',function (e) {

                    e.preventDefault();

                    to = $('#to').val();
                    from = $('#from').val();

                    $.ajax({
                        headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url : "{{url('/accountfilter')}}",
                        type : "POST",
                        data : {
                            'from' : from,
                            'to' : to
                        },
                        success: function (response) {
                            alert(response);
                        },
                        error: function (msg) {
                            alert("ERROR");
                        }
                    });
                });
            });
        })(jQuery);
    </script>
@endsection
