@extends('main')

@section('content')


        <?php

            date_default_timezone_set('Asia/Manila');

            $date = date('Y-m-d');
            $time = date('H:i:s');

        ?>
        <div class="left">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Welcome admin!</h3>
            </div><!-- .nk-block-head-content -->
        </div>
        <div class="right">
            <div class="btn btn-flex bg-body h-40px px-5">
                <span class="me-4">
                    <span class="text-muted fw-semibold me-1">Today</span>
                    <span class="text-primary fw-bold"><?= date('F j, Y',strtotime($date))?> | <?= date('h:i A',strtotime($time))?></span>
                </span>
            </div>
        </div>

        <br>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap center">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <div class="">
                                        <p class="links cl-effect-1">
                                            <a class="effect" style="font-size: 34px" href="{{ route('drivers') }}">Total: {{ $driv }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title-group align-start mb-2 center">
                            <div class="card-title">
                                <div><h6 class="title text-dark"><b>Registered Driver(s)</b></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap center">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <div class="">
                                        <p class="links cl-effect-1">
                                            <a class="effect" style="font-size: 34px" href="{{ route('schedule') }}">Total: {{ $pen }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title-group align-start mb-2 center">
                            <div class="card-title">
                                <div><h6 class="title text-danger"><b>Pending Delivery(s)</b></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap center">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <div class="">
                                        <p class="links cl-effect-1">
                                            <a class="effect" style="font-size: 34px" href="{{ route('ongoing') }}">Total: {{ $on }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title-group align-start mb-2 center">
                            <div class="card-title">
                                <div><h6 class="title text-info"><b>Ongoing Delivery(s)</b></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap center">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <div class="">
                                        <p class="links cl-effect-1">
                                            <a class="effect" style="font-size: 34px" href="{{ route('completed') }}">Total: {{ $co }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title-group align-start mb-2 center">
                            <div class="card-title">
                                <div><h6 class="title text-success"><b>Completed Delivery(s)</b></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap center">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <div class="">
                                        <p class="links cl-effect-1">
                                            <a class="effect" style="font-size: 34px" href="{{ route('drivers') }}">Total: {{ $co }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title-group align-start mb-2 center">
                            <div class="card-title">
                                <div><h6 class="title text-warning"><b>Over Due Delivery(s)</b></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
