<html lang="zxx" class="js">

<head>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/logo2.jpg') }}" />
    <!-- Page Title  -->
    <title>JYP Trucking | Login </title>
    <!-- StyleSheets  -->
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
</head>

<body class="nk-body bg-white npc-default pg-auth">

    <div class="card-inner">
        <div class="row">
            <div class="col-lg-4 border border-info">
                <div class="nk-app-root">
                <!-- main @s -->
                <div class="nk-main ">
                        <!-- content @s -->
                        <div class="nk-content ">
                            <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                                <div class="brand-logo pb-4 text-center">
                                    <center><img src="{{ asset('images/jyplogo.png') }}" height="250"></center>
                                </div>
                                <div class="card">
                                    <div class="card-inner card-inner-lg">
                                        <form method="POST" action="{{ route('login.post') }}" autocomplete="on">
                                            @csrf
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                </div>
                                                <div class="form-control-wrap">
                                                    <center><input type="text" class="form-control form-control-lg" id="email" name="email"  placeholder="Email address"></center>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <center><input type="password" class="form-control form-control-lg" id="password" name="password"  placeholder="Password"></center>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <center><button class="btn btn-lg btn-primary btn-block">SIGN IN</button></center>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- content @e -->
                    </div>
                    <!-- main @e -->
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</body>



