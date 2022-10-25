@extends('main')

@section('content')
        <?php
        foreach ($drivers_arr as $dis){
            $mname = Str::of($dis->mname)->limit(1,'.');
        }

        ?>


    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Drivers</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em
                        class="icon ni ni-plus"></em><span>Add Driver</span></a>
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
                    @foreach ($drivers_arr as $dis)
                        <tr>
                            <td>{{ $dis->id }}</td>
                            <td style="text-transform:uppercase">{{ $dis->platenumber }}</td>
                            <td>{{ $dis->fname }} <?= $mname ?> {{ $dis->lname }}</td>
                            <td>{{ $dis->contact }}</td>
                            <td>
                                <a data-bs-toggle="modal" href="#editDrivers-{{ $dis->id }}" class="btn btn-dim btn-sm btn-primary">Edit</a>
                                <button type="button" id="delete-driver" data-driver="{{ $dis->id }}" class="btn btn-dim btn-sm btn-danger">Trash</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    <!-- modal @s -->
    <div class="modal fade" id="addEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Driver</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="addDriver" id="addEventForm" method="POST" class="form-validate is-alter">
                        @csrf
                        <div class="row gx-4 gy-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="fname">First Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="inputTextBox" name="fname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="mname">Middle Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="inputTextBox" name="mname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label" for="lname">Last Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="inputTextBox" name="lname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="platenumber">Plate Number</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="platenumber" name="platenumber" size="20" maxlength="20" style="text-transform:uppercase" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="contact">Contact Number</label>
                                    <div class="form-control-wrap">
                                        <input type="text" onkeypress="return isNumber(event)" class="form-control" id="contact" name="contact" minlength="11" maxlength="11" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="color">Color</label>
                                    <div class="form-control-wrap">
                                        <div class="form-control-select">
                                            <select class="form-control" id="color" name="color">
                                                <option disabled selected>select one option</option>
                                                <option style="background-color:#eb3434" value="1">Red</option>
                                                <option style="background-color:#34eb89" value="2">Green</option>
                                                <option style="background-color:#3471eb" value="3">Blue</option>
                                                <option style="background-color:#dceb34" value="4">Yellow</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addDriver" type="submit" class="btn btn-primary">Add Driver</button>
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
        @foreach ($drivers_arr as $ed)
            <div class="modal fade" id="editDrivers-{{ $ed->id }}">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Schedule</h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updateDriver', ['id' => $ed->id]) }}" id="addEventForm" method="POST" class="form-validate is-alter">
                                @csrf
                                <div class="row gx-4 gy-3">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fname">First Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputTextBox" name="fname" value="{{ $ed->fname }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="mname">Middle Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputTextBox" name="mname" value="{{ $ed->mname }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="form-label" for="lname">Last Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputTextBox" name="lname" value="{{ $ed->lname }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="platenumber">Plate Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="platenumber"
                                                    name="platenumber" style="text-transform:uppercase" value="{{ $ed->platenumber }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="contact">Contact Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" onkeypress="return isNumber(event)" class="form-control" id="contact" name="contact"
                                                    value="{{ $ed->contact }}" minlength="11" maxlength="11">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="color">Color</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="color" name="color" disabled readonly>
                                                    <option value="{{ $ed->color }}" selected>
                                                        <?php
                                                        if($ed->color == "1"){
                                                          echo "Red";
                                                        }elseif($ed->color == "2"){
                                                          echo "Green";
                                                        }elseif($ed->color == "3"){
                                                          echo "Blue";
                                                        }elseif($ed->color == "4"){
                                                          echo "Yellow";
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2 mt-4">
                                            <li>
                                                <button id="updateDriver" type="submit" class="btn btn-primary">Update Driver</button>
                                            </li>
                                            <li>
                                                <a href="#" class="link" data-bs-dismiss="modal">Cancel</a>
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

            function isNumber(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }

            $(document).on('keypress', '#inputTextBox', function (event) {
                var regex = new RegExp("^[a-zA-Z ]+$");
                var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                if (!regex.test(key)) {
                    event.preventDefault();
                    return false;
                }
            });
        </script>


    @endsection
