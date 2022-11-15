@extends('main')

@section('content')

        <?php
        foreach ($ong as $dis){
            $mname = Str::of($dis->driver? $dis->driver->mname: '')->limit(1,'.');
        }

        ?>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Delivery Logs</h3>
            </div><!-- .nk-block-head-content -->
        </div>
    </div>
        <div class="table-responsive">
            <table id="schedule_data" class="table table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>ID</td>
                        <td>Plate Number</td>
                        <td>Name</td>
                        <td>Arrival Date</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ong as $dis)
                        <?php
                        $cnt = 1;
                        ?>
                        <tr>
                            <td><?= $cnt ?>.</td>
                            <td>{{ $dis->id }}</td>
                            <td style="text-transform:uppercase">{{ $dis->driver? $dis->driver->platenumber: '' }}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} <?= $mname ?> {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ date('F j, Y',strtotime( $dis->arrive_id )) }}</td>
                            <td>
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
                        </tr>
                        <?php
                        $cnt=$cnt+1;
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>


        <script >

            $(document).ready(function() {
                $('#schedule_data').DataTable();

                $('body').on('click','#delete-driver', function () {
                    var driverId = $(this).attr('data-driver');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                    })
                    let ajaxData = {
                        url: "<?php echo url("/"); ?>" + "/deleteDriver/" + driverId,
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
