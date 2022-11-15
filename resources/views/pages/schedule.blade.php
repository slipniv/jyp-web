@extends('main')

@section('content')
        <?php
        foreach ($disp as $dis){
            $mname = Str::of($dis->driver? $dis->driver->mname: '')->limit(1,'.');
        }

        ?>


        <div class="row">
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('schedule') }}" class="title text-danger" style="font-weight: 800">Pending Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('ongoing') }}" class="title text-info" style="font-weight: 800">Ongoing Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="{{ route('completed') }}" class="title text-success" style="font-weight: 800">Completed Delivery(s)</a>
                    </div>
                </div>
            </div>
            <div class="colo">
                <div class="card card-border center">
                    <div class="card-inner">
                        <a href="" class="title text-warning" style="font-weight: 800">Over Due Delivery(s)</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Pending Deliveries</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add Delivery</span></a>
                </div><!-- .nk-block-head-content -->
            </div>
        </div>

        <div class="table-responsive">
            <table id="schedule_data" class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Plate Number</td>
                        <td>Name</td>
                        <td>Destination</td>
                        <td>Schedule Time</td>
                        <td>Schedule Date</td>
                        <td><center>Status</center></td>
                        <td><center>Action</center></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disp as $dis)
                        <tr>

                            <td>{{ $dis->id }}</td>
                            <td style="text-transform:uppercase">{{ $dis->driver? $dis->driver->platenumber: ''}}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} <?= $mname ?> {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ $dis->destination? $dis->destination->area: '' }}</td>
                            <td>{{ date('h:i A',strtotime($dis->time)) }}</td>
                            <td>{{ date('F j, Y',strtotime($dis->date)) }}</td>
                            <td class="center">
                                <?php
                                if($dis->status == 1){
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-success d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Completed</label>
                                  <?php
                                }elseif($dis->status == 3){
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-info d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Ongoing</label>
                                  <?php
                                }else{
                                  ?>
                                  <label class="badge badge-sm badge-dim bg-outline-danger d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Pending</label>
                                  <?php
                                }
                                ?>
                            </td>

                                <td>
                                    <a data-bs-toggle="modal" href="#viewSchedule-{{ $dis->id }}" class="btn btn-dim btn-sm btn-primary">View</a>
                                    <a data-bs-toggle="modal" href="#editSchedule-{{ $dis->id }}" class="btn btn-dim btn-sm btn-secondary">Edit</a>
                                    {{-- <button type="button" id="delete-schedule" data-driver="{{ $dis->id }}" class="btn btn-dim btn-sm btn-danger">Delete</button> --}}
                                    <a class="btn btn-dim btn-sm icon ni ni-mail-fill" style="margin-left: 2px;" href="javascript:;" id="send-message" data-id="{{ $dis->id }}"></a>
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
        <div class="modal fade" id="addEventPopup">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Delivery</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="addSchedule" id="addEventForm" method="POST" class="form-validate is-alter">
                            @csrf
                            <div class="row gx-4 gy-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="Drivername">Name</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="Drivername" name="Drivername">
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->id }}">{{ $ad->fname }} {{ $ad->mname }} {{ $ad->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="DestinationLoc">Destination</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="DestinationLoc" name="DestinationLoc">
                                                    @foreach ($area as $dd)
                                                    <option value="{{ $dd->id }}">{{ $dd->area }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="form-label">Date & Time</label>
                                        <div class="row gx-2">
                                            <div class="w-55">
                                                <div class="form-control-wrap">
                                                    <input type="date" id="date" name="date" class="form-control" min="<?=$date?>" data-date-format="yyyy-mm-dd" required>
                                                </div>
                                            </div>
                                            <div class="w-45">
                                                <div class="form-control-wrap">
                                                    <input type="TIME" id="time" name="time" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="d-flex justify-content-between gx-4 mt-1">
                                        <li>
                                            <button id="addSchedule" type="submit" class="btn btn-primary">Add Schedule</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- modal @e -->

        <!-- modal @s -->
        @foreach($disp as $es)
        <div class="modal fade" id="editSchedule-{{ $es->id }}" >
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Schedule</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('updateSchedule', ['id' => $es->id]) }}" id="addEventForm" method="POST" class="form-validate is-alter">
                            @csrf
                            <div class="row gx-4 gy-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="Drivername">Name</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="Drivername" name="Drivername">
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->id }}" {{ $es->driver_id ==  $ad->id? "selected": "" }}>{{ $ad->fname }} {{ $ad->mname }} {{ $ad->lname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="DestinationLoc">Destination</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="DestinationLoc" name="DestinationLoc">
                                                    @foreach ($area as $dd)
                                                    <option value="{{ $dd->id }}" {{ $es->destination_id ==  $dd->id? "selected": "" }}>{{ $dd->area }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="form-label">Date & Time</label>
                                        <div class="row gx-2">
                                            <div class="w-55">
                                                <div class="form-control-wrap">
                                                    <input value="{{ $es->date }}" type="date" id="date" name="date" min="<?=$date?>" class="form-control" data-date-format="yyyy-mm-dd" required>
                                                </div>
                                            </div>
                                            <div class="w-45">
                                                <div class="form-control-wrap">
                                                    <input value="{{ $es->time }}" type="time" id="time" name="time" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status</label>
                                        <div class="form-control-wrap ">
                                            <select name="status" id="status" class="custom-select select">
                                            <option value="2" <?php echo isset($es->status) && $es->status == 2 ? 'selected' : '' ?>>Pending</option>
                                            <option value="3" <?php echo isset($es->status) && $es->status == 3 ? 'selected' : '' ?>>Ongoing</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="d-flex justify-content-between gx-4 mt-1">
                                        <li>
                                            <button id="updateSchedule" type="submit" class="btn btn-primary">Update Schedule</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- modal @e -->
        @endforeach


        <!-- modal @s -->
        @foreach($disp as $es)
        <div class="modal fade" id="viewSchedule-{{ $es->id }}" >
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
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <div class="form-control-wrap ">
                                                <select class="form-control" disabled>
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->id }}" {{ $es->driver_id ==  $ad->id? "selected": "" }}>{{ $ad->fname }} {{ $ad->mname }} {{ $ad->lname }}</option>
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
                                        <label class="form-label">Schedule Date</label>
                                        <div class="form-control-wrap ">
                                            <input value="{{ date('F j, Y',strtotime($es->date)) }}"  class="form-control"  disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Schedule Time</label>
                                        <div class="form-control-wrap ">
                                            <input value="{{ date('h:i A',strtotime($es->time)) }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</label>
                                        <div class="form-control-wrap ">
                                            <?php
                                            if($dis->status == 1){
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-success d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Completed</label>
                                            <?php
                                            }elseif($dis->status == 3){
                                            ?>
                                            <label class="badge badge-sm badge-dim bg-outline-info d-none d-md-inline-flex" style="text-transform: uppercase; letter-spacing: 1px;">Ongoing</label>
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
                $('body').on('click','#delete-schedule', function () {
                    var driverId = $(this).attr('data-driver');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                    })
                    let ajaxData = {
                        url: "<?php echo url("/"); ?>" + "/deleteSchedule/" + driverId,
                        type: 'POST',
                        async: false,
                        success: function (e) {
                            window.location.reload();
                        },
                        error: function (e) {
                            // Show popup confirmation
                            console.error(e)
                        },
                    }

                    $.ajax(ajaxData)
                });



                $('body').on('click','#send-message', function () {
                    var driverId = $(this).attr('data-id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                    })
                    let ajaxData = {
                        url: "<?php echo url("/"); ?>" + "/sendMessage/" + driverId,
                        type: 'POST',
                        async: false,
                        success: function (e) {
                            window.location.reload();
                        },
                        error: function (e) {
                            // Show popup confirmation
                            console.error(e)
                        },
                    }

                    $.ajax(ajaxData)
                });
            });
        </script>


@endsection
