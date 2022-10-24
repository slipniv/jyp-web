@extends('main')

@section('content')
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
                            <td>{{ $dis->platenumber }}</td>
                            <td>{{ $dis->name }}</td>
                            <td>{{ $dis->contact }}</td>
                            <td>
                                <a data-bs-toggle="modal" href="#editDrivers-{{ $dis->id }}" class="btn btn-dim btn-sm btn-primary">Edit</a>
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
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="platenumber">Plate Number</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="platenumber" name="platenumber"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="contact">Contact Number</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            required>
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
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $ed->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="platenumber">Plate Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="platenumber"
                                                    name="platenumber" value="{{ $ed->platenumber }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="contact">Contact Number</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="contact" name="contact"
                                                    value="{{ $ed->contact }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label" for="color">Color</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control" id="color" name="color" readonly>
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
            });
        </script>


    @endsection
