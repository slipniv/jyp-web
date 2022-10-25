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
            <a href="#" class="btn btn-flex bg-body h-40px px-5">
                <span class="me-4">
                    <span class="text-muted fw-semibold me-1">Today</span>
                    <span class="text-primary fw-bold"><?= date('F j, Y',strtotime($date))?> | <?= date('h:i A',strtotime($time))?></span>
                </span>
            </a>
        </div>
        
        <br>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <a href="{{ route('drivers') }}"><h6 class="title text-dark"><b>Registered Driver(s)</b></h6></a>
                            </div>
                            <div class="card-tools">
                                <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Total Drivers" data-bs-original-title="Total Drivers"></em>
                            </div>
                        </div>
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <span class="amount">{{ $driv }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <a href="{{ route('schedule') }}"><h6 class="title text-danger"><b>Pending Schedule(s)</b></h6></a>
                            </div>
                            <div class="card-tools">
                                <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Pending Schedules" data-bs-original-title="Pending Schedules"></em>
                            </div>
                        </div>
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <span class="amount">{{ $pen }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <a href="{{ route('ongoing') }}"><h6 class="title text-info"><b>Ongoing Schedule(s)</b></h6></a>
                            </div>
                            <div class="card-tools">
                                <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Ongoing Schedules" data-bs-original-title="Ongoing Schedules"></em>
                            </div>
                        </div>
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <span class="amount">{{ $on }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-2">
                            <div class="card-title">
                                <a href=""><h6 class="title text-success"><b>Completed Deliveries</b></h6></a>
                            </div>
                            <div class="card-tools">
                                <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Ongoing Schedules" data-bs-original-title="Ongoing Schedules"></em>
                            </div>
                        </div>
                        <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                            <div class="nk-sale-data-group flex-md-nowrap g-4">
                                <div class="nk-sale-data">
                                    <span class="amount">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
