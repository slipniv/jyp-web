<html lang="zxx" class="js">

<head>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css"/>

    <script src="//code.jquery.com/jquery-3.5.1.js" ></script>
    
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
    
    <script src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" ></script>
    <script src="//cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" ></script>
    <script src="//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"> </script>

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo2.jpg') }}" />
    <!-- Page Title  -->
    <title>JYP Trucking Tracking Services </title>
    <!-- StyleSheets  -->
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
   

<!-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js" type="text/javascript"></script> -->

    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap.min.css"/> -->

    
   
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
    integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>
     <meta name="csrf-token" content="{{csrf_token()}}">

     <!-- <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> -->

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  </head>
<style type="text/css">
    body {
     counter-reset: num;
    }

    h4::before {
    counter-increment: num;
    content: counter(num);
    }
</style>

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
