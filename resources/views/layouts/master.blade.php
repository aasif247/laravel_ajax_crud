@include('layouts.stylesheets')
@include('layouts.sidebar')
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    @yield('content')
    @include('layouts.footer')
    @yield('script')
</div>
<!-- end main content-->
@include('layouts.scripts')
