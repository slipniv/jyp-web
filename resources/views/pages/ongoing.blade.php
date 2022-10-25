@extends('main')

@section('content')

        <?php
        foreach ($disp as $dis){
            $mname = Str::of($dis->driver? $dis->driver->mname: '')->limit(1,'.');
        }

        ?>

        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">On-going Deliveries</h3>
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
                        <td>Schedule Date</td>
                        <td>Arrival Date</td>
                        <td><center>Status</center></td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disp as $dis)
                        <tr>
                            <td>{{ $dis->id }}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} <?= $mname ?> {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ $dis->destination? $dis->destination->area: '' }}</td>
                            <td>{{ date('F j, Y',strtotime($dis->startingDate)) }}</td>
                            <td>{{ date('F j, Y',strtotime($dis->arrivalDate)) }}</td>
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
                                                <select class="form-control" id="Drivername" name="Drivername" disabled readonly>
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->id }}" {{ $es->driver_id ==  $ad->id? "selected": "" }}>{{ $ad->fname }} {{ $ad->mname }} {{ $ad->lname }}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="DestinationLoc">Destination</label>
                                        <div class="form-control-wrap ">
                                                <select class="form-control" id="DestinationLoc" name="DestinationLoc" disabled readonly>
                                                    @foreach ($area as $dd)
                                                    <option value="{{ $dd->id }}" {{ $es->destination_id ==  $dd->id? "selected": "" }}>{{ $dd->area }}</option>
                                                    @endforeach
                                                </select>

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
                                            <option value="1" <?php echo isset($es->status_id) && $es->status_id == 1 ? 'selected' : '' ?>>Completed</option>
                                            <option value="3" <?php echo isset($es->status_id) && $es->status_id == 3 ? 'selected' : '' ?>>Ongoing</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="d-flex justify-content-between gx-4 mt-1">
                                        <li>
                                            <button id="updateSchedule" type="submit" class="btn btn-primary">Update Schedule</button>
                                        </li>
                                        <li>
                                            <button id="resetEvent" data-bs-dismiss="modal" class="btn btn-danger btn-dim">Discard</button>
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
                                        <label class="form-label">Schedule Date</label>
                                        <div class="form-control-wrap ">
                                            <input value="{{ date('F j, Y',strtotime($es->startingDate)) }}"  class="form-control"  disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Arrival Date</label>
                                        <div class="form-control-wrap ">
                                            <input value="{{ date('F j, Y',strtotime($es->arrivalDate)) }}" class="form-control" disabled>
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

        {{-- <button type="button" id="delete-schedule" data-driver="{{ $dis->id }}" class="btn btn-dim btn-sm btn-danger">Delete</button>
                --- delete ---

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
                }); --}}


        <script >

            $(document).ready(function() {
                $('#schedule_data').DataTable();
            });
        </script>


@endsection
