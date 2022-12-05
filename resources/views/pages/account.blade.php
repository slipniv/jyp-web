@extends('main')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row" style="display: block;">
                <div class="col-md-12 mb-4">
                    <div class="row">
                        <div class="col-12 col-xl-12 ">
                            <h3 class="font-weight-bold"><i class="mdi mdi-settings menu-icon"></i>Account Settings</h3>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body p-2 pt-4" style="min-height: 500px;">
                                <div class="col-md-12">
                                    <form action="{{ route('updateEmail', $user->id) }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2 text-right"><label class="mt-2"
                                                    style="letter-spacing: 2px; font-weight: 800">Email :</label>
                                            </div>
                                            <div class="col-md-10"><input required
                                                    style="background-color: #fff !important;"
                                                    class="form-control form-control-sm" placeholder="Username"
                                                    value="{{ $user->email }}" name="iemail"></input>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2 text-right"></div>
                                            <div class="col-md-10 text-right"><button type="submit"
                                                    class="btn btn-outline-info btn-md"> Save Changes</button></input></div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form action="{{ route('updatePass', $user->id) }}" method="POST" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2 text-right"><label class=""
                                                    style="letter-spacing: 2px; font-weight: 800">Current Password
                                                    :</label>
                                            </div>
                                            <div class="col-md-10"><input type="password" required
                                                    class="form-control form-control-sm" placeholder="Current Password"
                                                    name="current_password" id="current_password"></input></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2 text-right"><label class=""
                                                    style="letter-spacing: 2px; font-weight: 800">New Password
                                                    :</label>
                                            </div>
                                            <div class="col-md-10"><input placeholder="New Password" id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="current-password">
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <small>New Password and Confirm Password did not match!</small>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2 text-right"><label class=""
                                                    style="letter-spacing: 2px; font-weight: 800">Confirm Password
                                                    :</label>
                                            </div>
                                            <div class="col-md-10"><input placeholder="Re-enter New Password" id="new_password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password_confirmation" required autocomplete="current-password"></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2 text-right"></div>
                                            <div class="col-md-10 text-right"><button class="btn btn-outline-success btn-md" type="submit"
                                                    >Change Password</button></input></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
