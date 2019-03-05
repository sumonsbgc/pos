@php

use Illuminate\Support\Facades\Auth;

@endphp
@extends('Template_file.master')
@section('title', 'MY Account') 
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">My Profile</h3>
                 <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">My Account
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
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Profile</h4>
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
                            {{-- <div class="card-form-body">
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
                            </div> --}}
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Role</td>
                                                <td>{{Auth::user()->user_role}}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>User Name</td>
                                                <td>{{Auth::user()->username}}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{Auth::user()->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile No</td>
                                                <td>{{Auth::user()->mobile_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Present Address</td>
                                                <td>{{Auth::user()->present_add}}</td>
                                            </tr>
                                            <tr>
                                                <td>Permanent Address</td>
                                                <td>{{Auth::user()->permanent_add}}</td>
                                            </tr>
                                            <tr>
                                                <td>NID NO</td>
                                                <td>{{Auth::user()->nid_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Birth Certificate No</td>
                                                <td>{{Auth::user()->birth_certificate_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Joining Date</td>
                                                <td>
                                                    @php
                                                        $joining_date = Auth::user()->created_at;
                                                        echo date_format($joining_date,'d-M-Y');
                                                    @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPass">Change Password</button>
                                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Edit Profile</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="modal fade" id="exampleModalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form form-horizontal" action="{{route('update_password')}}" method="post">
                                                            @method('post')

                                                            @csrf

                                                            <div class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control">New Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="password" id="projectinput1" class="form-control" placeholder="Password" name="password">
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-check-square-o"></i> Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form class="form form-horizontal" action="{{route('update_profile')}}" method="post">
                                                            @method('post')

                                                            @csrf

                                                            <div class="form-body">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput1">Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput1" class="form-control" name="name" value="{{Auth::user()->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">User Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="username" value="{{Auth::user()->username}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Present Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="present_add" value="{{Auth::user()->present_add}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Permanent Address</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="permanent_add" value="{{Auth::user()->permanent_add}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Mobile No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="mobile_no" value="{{Auth::user()->mobile_no}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">NID No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="nid_no" value="{{Auth::user()->nid_no}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput2">Birth Certificate No</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="projectinput2" class="form-control" name="birth_certificate_no" value="{{Auth::user()->birth_certificate_no}}">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-md-3 label-control" for="projectinput3">E-mail</label>
                                                                    <div class="col-md-9">
                                                                        <input type="email" id="projectinput3" class="form-control" name="mail" value="{{Auth::user()->email}}" disabled>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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