@extends('header')

@section('login')
<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <center><img src="{{ asset('images/jyplogo.png') }}" height="250"></center>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <center><h4 class="nk-block-title">Sign-In</h4></center>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login.post') }}" autocomplete="on">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                        </div>
                                        <div class="form-control-wrap">
                                            <center><input type="text" class="form-control form-control-lg" id="default-01" placeholder="Email address"></center>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <center><input type="password" class="form-control form-control-lg" id="password" placeholder="Password"></center>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center><button class="btn btn-lg btn-primary btn-block">SIGN IN</button></center>
                                    </div>
                                </form>
                                <center><div class="form-note-s2 pt-4">No account yet?<a
                                    href="{{ route('register') }}"> Sign up</a>
                                </div></center>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>

@endsection



