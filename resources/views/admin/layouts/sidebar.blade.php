    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
                    <ul class="menu-content">
                        <li class="active"><a class="menu-item" href="dashboard-ecommerce.html" data-i18n="eCommerce">eCommerce</a>
                        </li>
    
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Mentor</span></a>
                  <ul class="menu-content">
                    <li class="{{ in_array(Route::currentRouteName(), ['mentor.index','mentor.edit']) ? 'active' : '' }}"><a href="{{route('mentor.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Mentor</span></a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['mentor_register']) ? 'active' : '' }}"><a href="{{route('mentor_register')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Mentor</span></a></li>
                </ul>
                </li>

                <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Category</span></a>
                  <ul class="menu-content">
                    <li class="{{ in_array(Route::currentRouteName(), ['category.index','category.edit']) ? 'active' : '' }}"><a href="{{route('category.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Category</span></a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['category.create']) ? 'active' : '' }}"><a href="{{route('category.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Category</span></a></li>
                </ul>
                </li>

                 <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Services</span></a>
                  <ul class="menu-content">
                    <li class="{{ in_array(Route::currentRouteName(), ['services.index','services.edit']) ? 'active' : '' }}"><a href="{{route('services.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Services</span></a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['services.create']) ? 'active' : '' }}"><a href="{{route('services.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add Services</span></a></li>
                </ul>
                </li>

                <li class="{{ in_array(Route::currentRouteName(), ['lead.index']) ? 'active' : '' }}"><a href="{{route('lead.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Lead</span></a></li>

                <li class="nav-item"><a href="#"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">User Roles</span></a>
                  <ul class="menu-content">
                    <li class="{{ in_array(Route::currentRouteName(), ['user_role.index','user_role.edit']) ? 'active' : '' }}"><a href="{{route('user_role.index')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">User Roles</span></a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['user_role.create']) ? 'active' : '' }}"><a href="{{route('user_role.create')}}" class="menu-item"><i class="fa fa-flag"></i><span data-i18n="" class="menu-title">Add User Role</span></a></li>
                </ul>
                </li>




            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->