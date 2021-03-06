@extends('Template_file.master') 
@section('title','Product Category') 
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Category List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="configuration">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Add Categories</h4>
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
                            <div class="card-content collapse show">
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
                                    <form class="form" action={{route( 'categories.store')}} method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="category">Category Name</label>
                                                <input type="text" id="companyName" class="form-control" placeholder="Category Name" name="category_name">
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput5">Category Status</label>
                                                <select id="projectinput5" name="parent_status" class="form-control">
                                                        <option value="0">Main Category</option>
                                                        @foreach($category as $mainCategory)
                                                            <option value="{{$mainCategory->id}}">{{$mainCategory->category_name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                        </div>
                                    </form>

                                    
<<<<<<< HEAD
                                @if(Session::has('message2'))
=======
                                @if(Session::has('message1'))
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Show Categories</h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Category</th>
                                                <th>Parent Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php 
                                                $id=0; 
                                            @endphp

                                     @foreach($all as $data) 
                                             @php
                                                $id++; 
                                             @endphp 


                                            <tr>
                                                <td>{{$id}}</td>
                                                <td>{{$data->category_name}}</td>
                                               <td>
                                                    {{-- {{$data->parent_status}} --}}
                                                   @if($data->parent_status == 0)
                                                   {{"Main Category"}}
                                                   @else

                                                   {{ parent_cate_name($data->parent_status)}}
                                                   @endif
                                               </td>

                                                <td>
                                                    <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#exampleModal{{$data->id}}">
                                                            <i class="fa fa-list"></i>
                                                        </button>

                                                    <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i
                                                                class="fa fa-times"></i>
                                                        </button>
                                                </td>
                                            </tr>
<<<<<<< HEAD
=======
                                     
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

                                        <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                         
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="{{route('categories.update',$data->id)}}" method="POST">
                                                                @method('PATCH') @csrf
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="category" value="{{$data->category_name}}" name="category_name" class="form-control">
                                                                </div>

                                                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary" type="submit"><strong>Update</strong></button>
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
=======
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
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59

                                            <div id="deleteModal{{$data->id}}" class="modal fade">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
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

                                                            <form action="{{route('categories.destroy',$data->id)}}" method="POST">
                                                                {{ method_field('DELETE') }} @csrf
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     @endforeach

<<<<<<< HEAD
                                            @if(Session::has('message3'))

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
                                                </div>
                                            @endif
                                        </tbody>
=======
                                     
                                     @if(Session::has('message3'))

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
                                     </div>
                                     @endif
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
                                        <tfoot>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Brand Name</th>
                                                <th>Parent Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </tbody>
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

@section('scripts')

    @if(Session::has('message10'))
        <script>swal("Warning!", "This Category Has Many Product Or Brands. Remove Or Change Those Category First", "warning")</script>
    @endif

<script>
    @if(Session::has('message1'))
            $('#successModal').modal('show');
        @endif
        $('#successModal').delay(2000).fadeOut('slow') 
        setTimeout(function(){
          $('#successModal').modal('hide')
}, 2500);
// $('#successModal').delay(2000).fadeOut('slow');
</script>

<script>
<<<<<<< HEAD
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
    $('#deleteModal').modal('show');
    @endif
    $('#deleteModal').delay(2000).fadeOut('slow')
    setTimeout(function(){
        $('#deleteModal').modal('hide')
    }, 2500);
    // $('#successModal').delay(2000).fadeOut('slow');
</script>
=======
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
        $('#deleteModal').modal('show');
        @endif
        $('#deleteModal').delay(2000).fadeOut('slow')
        setTimeout(function(){
            $('#deleteModal').modal('hide')
        },2500);
    
    </script>
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
@endsection