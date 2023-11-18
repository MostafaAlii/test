<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="flex-row nav navbar-nav">
                <li class="mr-auto nav-item mobile-menu d-lg-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="mr-auto nav-item"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <img class="brand-logo" alt="#" style="width:35px;height:35px;"
                            src="{{ $settings?->ImagePath() }}">
                        <h6 class="brand-text">{{ $settings?->name }}</h6>
                    </a></li>
                <li class="nav-item d-none d-lg-block nav-toggle">
                    <a class="pr-0 nav-link modern-nav-toggle" data-toggle="collapse">
                        <i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a>
                </li>
                <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="material-icons mt-50">more_vert</i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="float-left mr-auto nav navbar-nav">
                    <li class="nav-item"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="float-right nav navbar-nav">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1 user-name text-bold-700">{{ get_user_data()->name }}</span>
                            <span class="avatar avatar-online">
                                <img src="{{ asset('app-assets/images/avatar.jpg') }}">
                                <i></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">


                            <a class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('log-out').submit();">
                                <i class="material-icons">power_settings_new</i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <form id="log-out" action="{{ route(get_guard_name() . '.logout') }}" method="POST">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
