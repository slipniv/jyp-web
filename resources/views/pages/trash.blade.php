@extends('main')

@section('content')

        <?php
        foreach ($ong as $dis){
            $mname = Str::of($dis->mname)->limit(1,'.');
        }

        ?>

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Archived Driver Data</h3>
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
                        <td>Contact Number</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ong as $dis)
                        <tr>
                            <td>{{ $dis->id }}</td>
                            <td style="text-transform:uppercase">{{ $dis->platenumber }}</td>
                            <td>{{ $dis->fname }} <?= $mname ?> {{ $dis->lname }}</td>
                            <td>{{ $dis->contact }}</td>
                            <td>
                                <a href="{{ route('restoreDriver',['id' => $dis->id]) }}"><button class="btn btn-dim btn-sm btn-primary">Restore</button></a>
                                <button type="button" id="delete-driver" data-driver="{{ $dis->id }}" class="btn btn-dim btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
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
