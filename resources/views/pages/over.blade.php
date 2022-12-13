@extends('main')

@section('content')



        <div class="row">
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('schedule') }}" class="title text-black" style="font-weight: 800">Pending Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('ongoing') }}" class="title text-black" style="font-weight: 800">Ongoing Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('completed') }}" class="title text-black" style="font-weight: 800">Completed Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('overdue') }}" class="title text-black" style="font-weight: 800">Over Due Delivery(s)</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Over-Due Deliveries</h3>
                </div><!-- .nk-block-head-content -->
            </div>
        </div>

        <div class="table-responsive">
            <table id="schedule_data" class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Destination</td>
                        <td>Over Date</td>
                        <td><center>Status</center></td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ong as $dis)
                        <tr>
                            <td>{{ $dis->id }}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ $dis->destination? $dis->destination->area: '' }}</td>
                            <td>{{ date('F j, Y',strtotime($dis->overtime)) }}</td>
                            <td class="center">
                                <?php
                                if($dis->status_id == 1){
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-success d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Completed</label>
                                  <?php
                                }elseif($dis->status_id == 3){
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-info d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Ongoing</label>
                                  <?php
                                }elseif($dis->status_id == 4){
                                ?>
                                <label class="badge badge-sm badge-dim bg-outline-warning d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Overdue</label>
                                <?php
                                }else{
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-danger d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Pending</label>
                                  <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a data-bs-toggle="modal" href="#viewSched-{{ $dis->id }}" class="btn btn-dim btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <?php

            date_default_timezone_set('Asia/Manila');

            $date = date('Y-m-d');

        ?>

        <!-- modal @s -->
        @foreach($ong as $es)
        <div class="modal fade" id="viewSched-{{ $es->id }}" >
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Schedule</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                            <div class="row gx-4 gy-3">
                                <div class="col-4">
                                    <label class="form-label">Plate Number</label>
                                    <select class="form-control" style="text-transform:uppercase" disabled>
                                        @foreach ($sched_arr as $ad)
                                        <option value="{{ $ad->id }}" {{ $es->driver_id ==  $ad->id? "selected": "" }}>{{ $ad->platenumber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <div class="form-control-wrap ">
                                                <select class="form-control" disabled>
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->id }}" {{ $es->driver_id ==  $ad->id? "selected": "" }}>{{ $ad->fname }} {{ $ad->lname }} {{ $ad->mname }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Destination</label>
                                        <div class="form-control-wrap ">
                                                <select class="form-control" disabled>
                                                    @foreach ($area as $dd)
                                                    <option value="{{ $dd->id }}" {{ $es->destination_id ==  $dd->id? "selected": "" }}>{{ $dd->area }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Overdue Time</label>
                                        <div class="form-control-wrap ">
                                            <input value="{{ date('h:i A',strtotime($es->overtime)) }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</label>
                                        <div class="form-control-wrap ">
                                            <?php
                                            if($dis->status_id == 1){
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-success d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Completed</label>
                                            <?php
                                            }elseif($dis->status_id == 3){
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-info d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Ongoing</label>
                                            <?php
                                            }elseif($dis->status_id == 4){
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-warning d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Overdue</label>
                                            <?php
                                            }else{
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-danger d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Pending</label>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div> <!-- modal @e -->
        @endforeach

        <script >

            $(document).ready(function() {
                $('#schedule_data').DataTable();
            });
        </script>


@endsection
