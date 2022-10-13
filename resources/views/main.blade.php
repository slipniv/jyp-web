<html lang="zxx" class="js">

<head>
    <link rel="shortcut icon" href="" />
    <!-- Page Title  -->
    <title>JYP Trucking | Login </title>
    <!-- StyleSheets  -->
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
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

</body>

</html>
