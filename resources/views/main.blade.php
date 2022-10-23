<html lang="zxx" class="js">

<head>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo2.jpg') }}" />
    <!-- Page Title  -->
    <title>JYP Trucking | Login </title>
    <!-- StyleSheets  -->
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

    <!-- Leaflet plugin -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
    integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('sidebar')
            <!-- sidebar @s -->

            <!-- wrap @s -->
            <div class="nk-wrap ">
                @include('header')
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                @include('footer')
            </div>
            <!-- wrap @e -->
        </div>
    </div>
    @include('sweetalert::alert')
</body>

</html>
