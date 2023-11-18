
@include('auth.admin._tpl_start')
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu material-vertical-layout material-layout 1-column   blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row"></div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->
    
</body>
<!-- END: Body-->
</html>