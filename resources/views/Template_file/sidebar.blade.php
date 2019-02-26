<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>General</span><i class=" ft-minus" data-toggle="tooltip"
                                                                  data-placement="right"
                                                                  data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/')}}"><i class="ft-home"></i><span class="menu-title"             data-i18n="">Dashboard</span></a>
            </li>

            @if(Auth::user()->user_role == 'owner')
            <li class=" nav-item"><a href="{{url('/register')}}"><i class="ft-users"></i><span class="menu-title"             data-i18n="">Create User</span></a>
            </li>
            @endif

            <li class=" nav-item"><a href="{{url('/brands/create')}}"><i class="ft-star"></i><span class="menu-title" data-i18n="">Product Brand</span></a>
            <li class=" nav-item"><a href="{{url('/categories/create')}}"><i class="ft-navigation"></i><span class="menu-title" data-i18n="">Product Category</span></a>



        </ul>
    </div>
</div>