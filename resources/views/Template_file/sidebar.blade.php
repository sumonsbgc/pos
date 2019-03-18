<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{url('/')}}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a href="{{url('/categories/create')}}"><i class="ft-share-2"></i><span
                            class="menu-title" data-i18n="">Product Category</span></a>
            </li>

            <li class=" nav-item"><a href="{{url('/brands/create')}}"><i class="icon-badge"></i><span class="menu-title"
                                                                                                   data-i18n="">Product Brand</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="icon-handbag"></i><span class="menu-title"
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

            <li class=" nav-item"><a href="#"><i class="icon-user-follow"></i><span class="menu-title" data-i18n=""> Product Supplier</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/supplier/create')}}"><span class="menu-title" data-i18n="">Add Supplier</span></a>
                    </li>
                    <li>
                        <a href="{{url('/supplier')}}"><span class="menu-title" data-i18n="">Show Supplier</span></a>
                    </li>
                </ul>
            </li>



            <li class=" nav-item"><a href="#"><i class="icon-bag"></i><span class="menu-title"
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
            <li class="nav-item"><a href="{{url('/expenses')}}"><i class="fa fa-eur"></i><span class="menu-title"
                                                                                                 data-i18n="">Expenses</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-basket-loaded"></i><span class="menu-title" data-i18n=""> Sales</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{url('/sales_entries_create')}}"><span class="menu-title"
                                                                         data-i18n="">Sales Entries</span></a>
                    </li>
                    <li>
                        <a href="{{url('/sold')}}"><span class="menu-title" data-i18n="">Sold Product</span></a>
                    </li>
                    <li>
                        <a href="{{url('/sales_history')}}"><span class="menu-title"
                                                                  data-i18n="">Sales History</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="{{url('/customers')}}"><i class="fa fa-users"></i><span
                            class="menu-title" data-i18n="">Customers</span></a>
            </li>
            <li class="nav-item"><a href="{{url('/account')}}"><i class="fa fa-money"></i><span class="menu-title"
                                                                                                data-i18n="">Account</span></a>
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
        @if(Auth::user()->user_role == 'owner')

                <li class=" nav-item"><a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="">Users</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item"><a href="{{url('/register')}}"><span class="menu-title" data-i18n="">Create User</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{url('/users')}}"><span class="menu-title" data-i18n="">All Users</span></a>
                        </li>
                    </ul>
                </li>

            @endif
        </ul>
    </div>
</div>