<!-- Start Nav -->
<!--<nav class="p-navbar navbar navbar-expand-lg navbar-light">-->
<!--    <div class="p-0 container-fluid">-->
<!--        <a class="navbar-brand" href="index.html" >-->
<!--            <img src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" class="align-top d-inline-block" alt="Photorelive | Photo Retouching Service | Old Photo Restoration Service" >-->
<!--        </a>-->
<!--        <i class="jam jam-menu navbar-toggler-btn"></i>-->
        <!-- Start Left Menu -->
<!--        <div class="collapse navbar-collapse" id="navbarNav">-->
<!--            <ul class="navbar-nav main-menu">-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#" title="Photo Retouching Prices">Prices & Samples</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">FAQ</a>-->
<!--                </li>-->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="#">Contact Us</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
        <!-- End Left Menu -->
        <!-- Start Right Menu -->
<!--        <ul class="navbar-nav d-flex align-items-center">-->
<!--            <li class="nav-item dropdown userlogin-dropdown account-collapse">-->
<!--                <a class="nav-link navbar-profile-dropdown">-->
<!--                    <div class="user-avatar">MA</div>-->
<!--                    Mostafa Ali .-->
<!--                    <i class="ml-1 fa fa-chevron-down"></i>-->
<!--                </a>-->
<!--                <div class="user-dropdown dropdown-menu-right" id="account-collapse">-->
<!--                    <div class="my-shadow">-->
<!--                        <a class="dropdown-item" href="{{ route('website.client.dashboard') }}">Dashboard</a>-->
<!--                        <a class="dropdown-item" href="#">Logout</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="nav-item my-btn">-->
<!--                <a class="nav-link order-now-link" href="#">Order Now</a>-->
<!--                <div class="my-btn-bg"></div>-->
<!--            </li>-->
<!--        </ul>-->
        <!-- End Right Menu -->
<!--    </div>-->
<!--</nav>-->
<!-- End Nav -->


    <div class="container-fluid">
        <nav class="container navbar navbar-expand-lg navbar-light bg-light navbar-white-bg">
            <a class="navbar-brand logo" href="#"><img src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" /></a>
            <button id="navbarToggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ml-auto navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('website.home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownService" role="button" data-toggle="dropdown"-->
                    <!--       aria-haspopup="true" aria-expanded="false">-->
                    <!--        Service-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdownService">-->
                    <!--        <a class="dropdown-item" href="#">Action</a>-->
                    <!--        <a class="dropdown-item" href="#">Another action</a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="#">Something else here</a>-->
                    <!--    </div>-->
                    <!--</li>-->

                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" role="button" data-toggle="dropdown"-->
                    <!--       aria-haspopup="true" aria-expanded="false">-->
                    <!--        Blog-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdownBlog">-->
                    <!--        <a class="dropdown-item" href="#">Action</a>-->
                    <!--        <a class="dropdown-item" href="#">Another action</a>-->
                    <!--        <div class="dropdown-divider"></div>-->
                    <!--        <a class="dropdown-item" href="#">Something else here</a>-->
                    <!--    </div>-->
                    <!--</li>-->


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSignIn" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            @guest('web') Sign In @endguest
                            @auth('web') {{ get_user_data()->name }} @endauth
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownSignIn">
                            @guest('web')
                                <a class="dropdown-item" href="{{ route('login') }}">Sign In</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Registration</a>
                            @else
                                @if(Route::currentRouteName() !== 'website.client.dashboard')
                                    <a class="dropdown-item" href="{{ route('website.client.dashboard') }}">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('user-log-out').submit();">Sign-Out</a>
                                <form id="user-log-out" action="{{ route(get_guard_name().'.logout') }}" method="POST">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </li>
                    <li class="nav-item my-btn">
                        <a class="nav-link order-now-link" href="{{route('website.orders.index')}}">Order Now</a>
                        <div class="my-btn-bg"></div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        </div>
