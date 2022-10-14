<html lang="zxx" class="js">

<head>
    <link rel="shortcut icon" href="" />
    <!-- Page Title  -->
    <title>JYP Trucking | Login </title>
    <!-- StyleSheets  -->
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.0.3') }}">
    <link as="style" rel="preload stylesheet" href="{{ asset('assets/css/theme.css?ver=3.0.3') }}">
</head>

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
                                        <center><h4 class="nk-block-title">Register</h4></center>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('register.post') }}" autocomplete="on">
                                    @csrf
                                    <div class="form-group">
                                        <center><label class="form-label" for="name">Name</label></center>
                                        <div class="form-control-wrap">
                                            
                                            <center><input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter your name"></center>
                                            @if ($errors->has('name'))

                                                <span class="text-danger">{{ $errors->first('name') }}</span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center><label class="form-label" for="email">Email</label></center>
                                        <div class="form-control-wrap">
                                            
                                            <center><input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email address"></center>
                                            @if ($errors->has('email'))

                                                <span class="text-danger">{{ $errors->first('email') }}</span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center><label class="form-label" for="password">Password</label></center>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <center><input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password"></center>
                                            @if ($errors->has('password'))

                                                <span class="text-danger">{{ $errors->first('password') }}</span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center><button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"><a>Register</a></button></center>
                                    </div>
                                </form>
                                <center><div class="form-note-s2 pt-4"> Already have an account ? <a href="{{ route('login')}}"><strong>Sign in instead</strong></a>
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
</body>

