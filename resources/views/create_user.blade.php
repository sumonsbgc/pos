@extends('Template_file.master') 
@section('title','Add New User') 
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper">
           
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset('template_asset/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Create Account</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form-horizontal form-simple" action="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/index.html"
                                            novalidate>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <select class="form-control form-control-lg" name="user_role" id="basicSelect">
                                                    <option value="stuff">Stuff</option>
                                                </select>
                                                <div class="form-control-position">
                                                    <i class="ft-check"></i>
                                                </div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                <input type="text" class="form-control form-control-lg" id="user-name" name="username" placeholder="User Name">
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                <input type="text" class="form-control form-control-lg" id="user-name" name="name" placeholder="Full Name">
                                                <div class="form-control-position">
                                                    <i class="ft-user-x"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left mb-1">
                                                <input type="email" class="form-control form-control-lg" name="email" id="user-email" placeholder="Your Email Address" required>
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control form-control-lg" name="password" id="user-password" placeholder="Enter Password"
                                                    required>
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Register</button>
                                        </form>

                           
                                    </div>
                                    <p class="text-center">Already have an account ? <a href="{{route('login')}}" class="card-link">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

