<!-- Start Nav -->
<nav class="p-navbar navbar navbar-expand-lg navbar-light">
    <div class="p-0 container-fluid">
        <a class="navbar-brand" href="index.html" >
            <img src="{{ asset('website/resources/dashboard/resource/img/logo.png') }}" class="align-top d-inline-block" alt="Photorelive | Photo Retouching Service | Old Photo Restoration Service" >
        </a>
        <i class="jam jam-menu navbar-toggler-btn"></i>
        <!-- Start Left Menu -->
        <!--<div class="collapse navbar-collapse" id="navbarNav">-->
        <!--    <ul class="navbar-nav main-menu">-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#" title="Photo Retouching Prices">Prices & Samples</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">FAQ</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="#">Contact Us</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--</div>-->
        <!-- End Left Menu -->
        <!-- Start Right Menu -->
        @auth('web')
        <ul class="navbar-nav d-flex align-items-center">
            <li class="nav-item dropdown userlogin-dropdown account-collapse">
                <a class="nav-link navbar-profile-dropdown">
                    <div class="user-avatar">{{ implode('', array_map(function($word) { return strtoupper(substr($word, 0, 1)); }, explode(' ', get_user_data()?->name))) }}</div>
                    {{ get_user_data()?->name }} .
                    <i class="ml-1 fa fa-chevron-down"></i>
                </a>
                <div class="user-dropdown dropdown-menu-right" id="account-collapse">
                    <div class="my-shadow">
                        <a class="dropdown-item" href="{{ route('website.client.dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('user-log-out').submit();">Sign-Out</a>
                        <form id="user-log-out" action="{{ route(get_guard_name().'.logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
            <li class="nav-item my-btn">
                <a class="nav-link order-now-link" href="{{route('website.orders.index')}}">Order Now</a>
                <div class="my-btn-bg"></div>
            </li>
        </ul>
        @endauth
        <!-- End Right Menu -->
    </div>
</nav>
<!-- End Nav -->