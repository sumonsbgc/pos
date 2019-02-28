@extends('Template_file.master') 
@section('title', 'MY Account') 
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">My Profile</h3>
                {{-- <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Product Brand
                            </li>
                        </ol>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-6">
                        <div class="card profile_card">
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
                                {{-- @if(Auth::User()->user_role=='owner') --}}
                                  {{-- @foreach($profileData as $data) --}}

                                   <b>Name:</b><br> 
                                   {{$profileData->name}}<br>
                                

                                  {{-- @endforeach --}}
                                {{-- @endif --}}
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