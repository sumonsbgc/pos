@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Supplier;
    use App\Product;
    use App\User;
@endphp

@extends('Template_file.master')
@section('title','Accounts')
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
                                        <form action="{{route('report_search')}}" method="post">
                                            @csrf
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label>Filter</label>
                                                <select id="filter" class="form-control" name="filter" onclick="filters(this.value)">
                                                    <option value=""> Select One Option </option>
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
                                                        <input type="date" class="form-control"
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
                                                        <input type="date" class="form-control"
                                                               id="request_to" name="to" placeholder="Enter Date">
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn mr-1 mt-2 btn-success" id="search"><i
                                                            class="fa fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Zero configuration table-->
            </div>
            <div class="content-body">
                <section id="horizontal-form-layouts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-basic">Show Reports</h4>
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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <h3 class="pb-3">Full Summery Of The System</h3>
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                </tr>

                                                </thead>
                                                <tbody id="summery_of_system">
                                                <tr>
                                                    <td>Total Expense</td>
                                                    <td>{{$expense_quantity}}</td>
                                                    <td>{{$total_expense_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Purchase</td>
                                                    <td>{{$purchase_quantity}}</td>
                                                    <td>{{$total_purchase_amount}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Sale</td>
                                                    <td>{{$sale_quantity}}</td>
                                                    <td>{{$total_sale}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="font-weight-bold">Loss : {{$loss}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="font-weight-bold">Profit : {{$profit}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>


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
                                                    <th>Sl</th>
                                                    <th>Supplier Name</th>
                                                    <th>Amount</th>
                                                    <th>Paid</th>
                                                    <th>Due</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody id="purchase_history">

                                                @php
                                                    $p_id = 0;
                                                @endphp

                                                @foreach($all_purchase as $purchase)

                                                    <tr>
                                                        <td>
                                                            {{$p_id++}}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $supplier_name = Supplier::where('id',$purchase->supplier_id)->first();
                                                                echo $supplier_name['supplier_name'];
                                                            @endphp
                                                        </td>
                                                        <td>{{$purchase->total_amount}}</td>
                                                        <td>{{$purchase->cash_purchase}}</td>
                                                        <td>{{$purchase->credit_purchase}}</td>
                                                        <td>
                                                            @php
                                                                $purchase_date = date_create($purchase->created_at);

                                                                echo date_format($purchase_date,'d-M-Y')
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th id="total_purchase_amount">Total : {{$total_purchase_amount}}</th>
                                                    <th id="total_purchase_paid">Total : {{$paid_purchase}}</th>
                                                    <th id="total_purchase_due">Total : {{$due_purchase}}</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Supplier Name</th>
                                                    <th>Amount</th>
                                                    <th>Paid</th>
                                                    <th>Due</th>
                                                    <th>Date</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab42" aria-labelledby="base-tab42">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Receipt No</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Sale Rate</th>
                                                    <th>Receive</th>
                                                    <th>Due</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody id="sales_history">

                                                @php
                                                    $s_id = 0;
                                                @endphp
                                                @foreach($all_sale as $sale)
                                                    <tr>
                                                        <td>{{$s_id++}}</td>
                                                        <td>{{$sale->receipt_no}}</td>
                                                        <td>

                                                            @php

                                                                $p_name = Product::where('id',$sale->product_id)->first();

                                                                echo $p_name['product_name'];

                                                            @endphp

                                                        </td>
                                                        <td>{{$sale->sale_quantity}}</td>
                                                        <td>{{$sale->retail_rate}}</td>
                                                        <td>{{$sale->receive_amount}}</td>
                                                        <td>{{$sale->due_amount}}</td>
                                                        <td>
                                                            @php
                                                                $s_date = date_create($sale->created_at);

                                                                echo date_format($s_date,'d-M-Y')
                                                            @endphp
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th id="total_sale">Total : {{$total_sale}}</th>
                                                    <th id="paid_sale">Total : {{$paid_sale}}</th>
                                                    <th id="due_sale">Total : {{$due_sale}}</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Receipt No</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Sale Rate</th>
                                                    <th>Receive</th>
                                                    <th>Due</th>
                                                    <th>Date</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab43" aria-labelledby="base-tab43">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Username</th>
                                                    <th>Purpose</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody id="expense_history">
                                                @php
                                                    $e_id = 0;
                                                @endphp

                                                @foreach($all_expense as $expense)

                                                    <tr>
                                                        <td>{{$e_id++}}</td>
                                                        <td>
                                                            @php

                                                                $user_name = User::where('id',$expense->user_id)->first();

                                                                echo $user_name->username;

                                                            @endphp
                                                        </td>
                                                        <td>{{$expense->purpose}}</td>
                                                        <td>{{$expense->amount}}</td>
                                                        <td>
                                                            @php
                                                                $e_date = date_create($expense->created_at);

                                                                echo date_format($e_date,'d-M-Y')
                                                            @endphp
                                                        </td>
                                                    </tr>

                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th id="total_expense_amount">Total : {{$total_expense_amount}}</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Username</th>
                                                    <th>Purpose</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
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
@endsection


@section('scripts')
    <script>

        function filters(value) {

            var Filter = value;

            if (Filter != ""){
                $('#from').attr('disabled',true);
                $('#request_to').attr('disabled',true);
            }else {
                $('#from').attr('disabled',false);
                $('#request_to').attr('disabled',false);
            }

        }
    </script>
@endsection
