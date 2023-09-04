<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield("additional_head")
</head>
<body id="page-top" @yield('onLoad')>
    <div id="wrapper">
        @include('layouts.sidebar')
        <div id="content-wrapper" class="d-flex flex-column text-dark">
            <div id="content">
                @include('layouts.navbar')
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('layouts.modal')
    @yield('modal')
    @include('layouts.script')
    @yield('chart_area')
</body>
</html>
