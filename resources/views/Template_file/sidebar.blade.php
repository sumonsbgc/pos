<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>General</span><i class=" ft-minus" data-toggle="tooltip"
                                                                  data-placement="right"
                                                                  data-original-title="General"></i>
            </li>
            <li class=" nav-item"><a href="{{url('/')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>

            @if(Auth::user()->user_role == 'owner')
                <li class=" nav-item"><a href="{{url('/register')}}"><i class="ft-users"></i><span class="menu-title"
                                                                                                   data-i18n="">Create User</span></a>
                </li>


                <li class=" nav-item"><a href="{{url('/users')}}"><i class="ft-users"></i><span class="menu-title"
                                                                                                data-i18n="">All Users</span></a>
                </li>
            @endif


            <li class=" nav-item"><a href="{{url('/brands/create')}}"><i class="ft-star"></i><span class="menu-title"
                                                                                                   data-i18n="">Product Brand</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/reports')}}"><i class="ft-star"></i><span class="menu-title"
                                                                                                   data-i18n="">Reports</span></a>
            </li>
            <li class=" nav-item"><a href="{{url('/categories/create')}}"><i class="ft-navigation"></i><span
                            class="menu-title" data-i18n="">Product Category</span></a>
            </li>

            <li class=" nav-item"><a href="{{url('/customers')}}"><i class="ft-navigation"></i><span
                            class="menu-title" data-i18n="">Customers</span></a>
            </li>


            <li class=" nav-item"><a href="#"><i class="ft-cast"></i><span class="menu-title" data-i18n=""> Product Supplier</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/supplier/create')}}"><span class="menu-title" data-i18n="">Add Supplier</span></a>
                    </li>
                    <li>
                        <a href="{{url('/supplier')}}"><span class="menu-title" data-i18n="">Show Supplier</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="fa fa-th"></i><span class="menu-title"
                                                                            data-i18n=""> Products </span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/products/create')}}"><span class="menu-title"
                                                                    data-i18n="">Add Product</span></a>
                    </li>
                    <li>
                        <a href="{{url('/products')}}"><span class="menu-title" data-i18n="">Show Product</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-cast"></i><span class="menu-title"
                                                                           data-i18n=""> Purchase</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/create_purchase')}}"><span class="menu-title"
                                                                    data-i18n="">Create Purchase</span></a>
                    </li>
                    <li>
                        <a href="{{url('/show_purchase_notes')}}"><span class="menu-title" data-i18n="">Show Purchase List</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href="{{url('/expenses')}}"><i class="fa fa-rupee"></i><span class="menu-title"
                                                                                                 data-i18n="">Expenses</span></a>

            <li class="nav-item"><a href="{{url('/account')}}"><i class="fa fa-rupee"></i><span class="menu-title"
                                                                                                 data-i18n="">Account</span></a>


            <li class=" nav-item"><a href="#"><i class="ft-cast"></i><span class="menu-title" data-i18n=""> Sales</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/sales_entries_create')}}"><span class="menu-title"
                                                                         data-i18n="">Sales Entries</span></a>
                    </li>
                    <li>
                        <a href="{{url('/show_purchase_notes')}}"><span class="menu-title"
                                                                        data-i18n="">Show All Sale</span></a>
                    </li>
                    <li>
                        <a href="{{url('/sales_history')}}"><span class="menu-title"
                                                                        data-i18n="">Sales History</span></a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="ft-cast"></i><span class="menu-title" data-i18n="">Servicing</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/servicing/create')}}"><span class="menu-title"
                                                                         data-i18n="">Add Servicing Product</span></a>
                    </li>
                    <li>
                        <a href="{{url('/servicing/{servicing}')}}"><span class="menu-title"
                                                                        data-i18n="">Show Servicing Products</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>