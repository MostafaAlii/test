@include('website.layouts.common.client._tpl_start')
@include('website.dashboard.includes._navbar')
{{--@include('website.layouts.common.web._header')--}}
@yield('content')
@include('website.layouts.common.client._footer')
{{--@include('website.layouts.common.web._footer')--}}
@include('website.layouts.common.client._tpl_end')