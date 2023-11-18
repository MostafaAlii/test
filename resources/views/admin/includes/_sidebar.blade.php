<div class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="user-profile">
        <div class="pb-2 text-center user-info">
            <img class="mt-2 user-img img-fluid rounded-circle w-25" src="{{ asset('app-assets/images/avatar.jpg') }}"
                alt="{{-- auth()->user()->name --}}" />
            <div class="mt-1 name-wrapper d-block dropdown">
                <a class="white dropdown-toggle" id="user-account" href="#" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="user-name"> {{ get_user_data()->name }}</span>
                    <p class="user-name"> {{ get_user_data()->email }}</p>
                </a>
                <div class="dropdown-menu arrow" aria-labelledby="dropdownMenuLink">

                    <a class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('log-out').submit();">
                        <i class="mr-1 align-middle material-icons">power_settings_new</i>
                        <span class="align-middle">Logout</span>
                    </a>
                    <form id="log-out" action="{{ route(get_guard_name() . '.logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <!-- Start Dashboard -->
            <li class="{{ request()->routeIs('admin.dashboard') ? ' active' : null }}  nav-item ">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">settings_input_svideo</i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard -->


            <!-- Start Admin Menu -->
            <li class="nav-item {{ request()->routeIs(['admins.*', 'users.*']) ? ' open' : null }}">
                <a href="#">
                    <i class="material-icons">people_outline</i>
                    <span class="menu-title" data-i18n="Menu levels">Users Managment</span>
                </a>
                <ul class="menu-content">
                    <!--<li class="{{ request()->routeIs('admins.*') ? ' active' : null }}">-->
                    <!--    <a class="menu-item" href="{{ route('admins.index') }}">-->
                    <!--        <i class="mr-1 material-icons">people_outline</i>-->
                    <!--        <span data-i18n="Second level">Admins</span>-->
                    <!--        <span class="badge badge-primary round"> {{ Admin::count() }} </span>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <li class="{{ request()->routeIs('users.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('users.index') }}">
                            <i class="mr-1 material-icons">people_outline</i>
                            <span data-i18n="Second level">Clients</span>
                            <span class="badge badge-success round"> {{ User::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Admin Menu -->

            <!-- Start Main Settings -->
            <li class="{{ request()->routeIs('admin.mainSettings') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">settings</i>
                    <span class="menu-title" data-i18n="Menu levels">Settings Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.mainHome') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('admin.mainHome') }}">
                            <i class="mr-1 material-icons">home</i>
                            <span data-i18n="Second level">Main Home</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.aboutUs') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('admin.aboutUs') }}">
                            <i class="mr-1 material-icons">note</i>
                            <span data-i18n="Second level">About Us</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.feature') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('admin.feature') }}">
                            <i class="mr-1 material-icons">note</i>
                            <span data-i18n="Second level">Feature Section</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('icons.index') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('icons.index') }}">
                            <i class="mr-1 material-icons">images</i>
                            <span data-i18n="Second level">Icons</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('imgExtension.index') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('imgExtension.index') }}">
                            <i class="mr-1 material-icons">images</i>
                            <span data-i18n="Second level">Image Extension</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('button.index') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('button.index') }}">
                            <i class="mr-1 material-icons">images</i>
                            <span data-i18n="Second level">Button Managment</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('couple.index') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('couple.index') }}">
                            <i class="mr-1 material-icons">images</i>
                            <span data-i18n="Second level">Couple Photo</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('orderServiceTime.index') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('orderServiceTime.index') }}">
                            <span data-i18n="Second level">Turnaround Time</span>
                        </a>
                    </li>

                    <li class="{{ request()->routeIs('admin.mainSettings') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('admin.mainSettings') }}">
                            <i class="mr-1 material-icons">settings</i>
                            <span data-i18n="Second level">Main Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Main Settings -->

            <!-- Start Slider Menu -->
            <li class="{{ request()->routeIs('sliders.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Sliders Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('sliders.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('sliders.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Sliders</span>
                            <span class="badge badge-primary round"> {{ Slider::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Slider Menu -->

            <!-- Start Slider Menu -->
            <li class="{{ request()->routeIs('slides.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Slides Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('slides.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('slides.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Slides</span>
                            <span class="badge badge-primary round"> {{ Slide::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Slider Menu -->

            <!-- Start Gallery Menu -->
            <li class="{{ request()->routeIs('admin.mainGallery.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Gallery Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.mainGallery.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('admin.mainGallery') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Gallery</span>
                            <span class="badge badge-primary round"> {{ Gallery::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Gallery Menu -->

            <!-- Start Partner Menu -->
            <li class="{{ request()->routeIs('partners.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Partners Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('partners.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('partners.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Partners</span>
                            <span class="badge badge-primary round"> {{ Partner::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Partner Menu -->

            <!-- Start Retouching Services Menu -->
            <li class="{{ request()->routeIs('retouchService.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Retouching Managment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('retouchService.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('retouchService.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Retouch Service</span>
                            <span class="badge badge-primary round"> {{ RetouchService::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Partner Menu -->

            <!-- Start Retouching Services Menu -->
            <li class="{{ request()->routeIs('orderService.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Order Services</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('orderService.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('orderService.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Order Services</span>
                            <span class="badge badge-primary round"> {{ OrderService::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Partner Menu -->

            <!-- Start Orders Menu -->
            <li class="{{ request()->routeIs('orders.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="material-icons">image</i>
                    <span class="menu-title" data-i18n="Menu levels">Orders</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('orders.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('orders.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Orders</span>
                            <span class="badge badge-primary round"> {{ Order::count() }} </span>
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('orders.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('freeOrders.index') }}">
                            <i class="mr-1 material-icons">image</i>
                            <span data-i18n="Second level">Free Orders</span>
                            <span class="badge badge-primary round"> {{ FreeOrder::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Orders Menu -->

            <!-- Start Category Menu -->
            <li class="{{ request()->routeIs('sections.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Menu levels">Sections</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('sections.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('sections.index') }}">
                            <i class="icon-drawer"></i>
                            <span class="menu-title" data-i18n="Dashboard">Sections</span>
                            <span style="width: 25px;"></span>
                            <span class="badge badge-success round"> {{ \App\Models\Section::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Category Menu -->

            <!-- Start Category Menu -->
            <li class="{{ request()->routeIs('blogs.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Menu levels">blogs</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('blogs.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('blogs.index') }}">
                            <i class="icon-drawer"></i>
                            <span class="menu-title" data-i18n="Dashboard">blogs</span>
                            <span style="width: 25px;"></span>
                            <span class="badge badge-success round"> {{ \App\Models\Blog::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Category Menu -->

            <!-- Start Category Menu -->
            <li class="{{ request()->routeIs('comment.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Menu levels">comment</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('comment.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('comment.index') }}">
                            <i class="icon-drawer"></i>
                            <span class="menu-title" data-i18n="Dashboard">comment</span>
                            <span style="width: 25px;"></span>
                            <span class="badge badge-success round"> {{ \App\Models\Comment::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Category Menu -->

            <!-- Start Category Menu -->
            <li class="{{ request()->routeIs('services.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Menu levels">services</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('services.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('services.index') }}">
                            <i class="icon-drawer"></i>
                            <span class="menu-title" data-i18n="Dashboard">services</span>
                            <span style="width: 25px;"></span>
                            <span class="badge badge-success round"> {{ \App\Models\Service::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Category Menu -->

            <!-- Start Category Menu -->
            <li class="{{ request()->routeIs('packages.*') ? ' open' : null }} nav-item">
                <a href="#">
                    <i class="icon-drawer"></i>
                    <span class="menu-title" data-i18n="Menu levels">packages</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('packages.*') ? ' active' : null }}">
                        <a class="menu-item" href="{{ route('packages.index') }}">
                            <i class="icon-drawer"></i>
                            <span class="menu-title" data-i18n="Dashboard">packages</span>
                            <span style="width: 25px;"></span>
                            <span class="badge badge-success round"> {{ \App\Models\Package::count() }} </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Category Menu -->

        </ul>
    </div>
</div>
