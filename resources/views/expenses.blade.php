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
                    <h3 class="content-header-title mb-0">All Expenses</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">All Expenses
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary mb-2 float-right" data-toggle="modal" data-backdrop="false"
                    data-target="#exampleModal">
                <i class="ft-plus"></i>Add New
            </button>

            <div class="clearfix"></div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('message'))
                <div class="alert alert-warning alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Created Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(Session::has('update'))
                <div class="alert alert-warning alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Updated Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(Session::has('delete'))
                <div class="alert alert-warning alert-dismissible fade show notification" role="alert">
                    <strong>Hello {{Auth::user()->name}}!</strong> Expenses Deleted Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="modal fade" id="exampleModal" tabindex="-1"
                 role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <form class="form form-horizontal" action="{{route('expenses.store')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Purpose
                                        <span class="danger"> *</span>
                                    </label>
                                    <input class="form-control" name="purpose" placeholder="Purpose">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount
                                        <span class="danger"> *</span>
                                    </label>
                                    <input type="number" class="form-control" name="amount" placeholder="Amount">
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
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

            <div class="clearfix"></div>

            <div class="content-body">
                <!-- Zero configuration table -->

                <section id="configuration">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Expenses</h4>
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

                                            @php
                                                $serial = 0;
                                            @endphp

                                            @if($all->toArray() != null)

                                                @foreach($all as $data)
                                                    @php
                                                        $serial++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$serial}}</td>
                                                        <td>
                                                            @php
                                                                $name = \App\User::find($data->user_id)->select('username')->first();
                                                            echo $name->username;
                                                            @endphp
                                                        </td>
                                                        <td>{{$data->purpose}}</td>
                                                        <td>{{$data->amount}}</td>
                                                        <td>
                                                            {{date('M d, Y',strtotime($data->updated_at))}}
                                                        </td>
                                                        <td class="text-center edit_delete">
                                                            <button type="button" class="btn btn-primary btn-circle "
                                                                    data-toggle="modal"
                                                                    data-target="#edit{{$data->id}}">
                                                                <i class="fa fa-list"></i>
                                                            </button>

                                                            <button type="button" class="btn btn-warning btn-circle "
                                                                    data-toggle="modal"
                                                                    data-target="#deleteModal{{$data->id}}"><i
                                                                        class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="edit{{$data->id}}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">

                                                                    <form class="form form-horizontal"
                                                                          action="{{route('expenses.update',$data->id)}}"
                                                                          method="post">
                                                                        @method("PUT")
                                                                        @csrf

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Purpose
                                                                                <span class="danger"> *</span>
                                                                            </label>
                                                                            <input class="form-control" name="purpose"
                                                                                   placeholder="Purpose"
                                                                                   value="{{$data->purpose}}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Amount
                                                                                <span class="danger"> *</span>
                                                                            </label>
                                                                            <input type="number" class="form-control"
                                                                                   name="amount" placeholder="Amount"
                                                                                   value="{{$data->amount}}">
                                                                        </div>

                                                                        <div class="form-actions">
                                                                            <button type="button"
                                                                                    class="btn btn-warning mr-1"
                                                                                    data-dismiss="modal">
                                                                                <i class="ft-x"></i> Cancel
                                                                            </button>
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">
                                                                                <i class="fa fa-check-square-o"></i>
                                                                                Save
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
                                                                    <p>Do you really want to delete these records? This
                                                                        process
                                                                        cannot be
                                                                        undone.</p>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{route('expenses.destroy',$data->id)}}"
                                                                          method="POST">
                                                                        {{ method_field('DELETE') }} @csrf

                                                                        <button type="button" class="btn btn-dark"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                            Cancel
                                                                        </button>
                                                                        <button class="btn btn-danger" type="submit">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach

                                            @endif

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
                </section>
                <!--/ Zero configuration table -->

            </div>
        </div>
    </div>
@endsection