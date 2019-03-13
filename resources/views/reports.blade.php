@extends('Template_file.master')


@section('title','Reports')


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
                                <li class="breadcrumb-item active"><a href="#">Reports</a>
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

                                        <div class="search-options pb-4">
                                            <div class="row">
                                                <fieldset class="form-group col-lg-3">
                                                    <label for="basicSelect">Select Filter</label>
                                                    <select class="form-control" id="basicSelect">
                                                        <option value="">Default</option>
                                                        <option value="6">Last 7 Days</option>
                                                        <option value="14">Last 15 Days</option>
                                                        <option value="29">Last 30 Days</option>
                                                    </select>
                                                </fieldset>
                                                <fieldset class="form-group col-lg-3">
                                                    <label for="basicSelect">From</label>
                                                    <input type="date" name="from_date" id="from_date" class="form-control">
                                                </fieldset>
                                                <fieldset class="form-group col-lg-3">
                                                    <label for="basicSelect">To</label>
                                                    <input type="date" name="to_date" id="to_date" class="form-control">
                                                </fieldset>
                                                <fieldset class="form-group col-lg-3 align-self-end">
                                                    <button type="button" class="btn btn-primary" onclick="">Search Result</button>
                                                </fieldset>
                                            </div>

                                        </div>


                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <h3>Full Summery Of The System</h3>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Total Sale</td>
                                                    <td></td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Expense</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Purchase</td>
                                                    <td>the Bird</td>
                                                    <td>@twitter</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

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