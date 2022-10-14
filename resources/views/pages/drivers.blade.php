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
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools me-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search"
                                        data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="card-body">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                        class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search by user or email">
                            </div>
                        </div>
                    </div><!-- .card-search -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col tb-col-mb"><span class="tb-lead">ID</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="tb-lead">Plate Number</span></div>
                            <div class="nk-tb-col tb-col-mb"><span class="tb-lead">Name</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="tb-lead">Contact Number</span></div>
                            <div class="nk-tb-col tb-col-md"><span class="tb-lead">Action</span></div>
                        </div>


                        @foreach ($drivers_arr as $dis)
                            <!-- .nk-tb-item -->
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="sub-text">{{ $dis->id }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="sub-text">{{ $dis->platenumber }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="sub-text">{{ $dis->name }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text">{{ $dis->contact }}</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a data-bs-toggle="modal"
                                                                href="#editDrivers-{{ $dis->id }}"><em
                                                                    class="icon ni ni-focus"></em><span>Edit</span></a></li>
                                                        <li>
                                                            <form id="delete-driver-{{ $dis->id }}" action="{{ route('deleteDriver', ['id' => $dis->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <a href="javascript:$('#delete-driver-{{ $dis->id }}').submit();"><em class="icon ni ni-na"></em><span>Remove User</span></a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-list -->
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->

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
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="addDriver" type="submit" class="btn btn-primary">Add Driver</button>
                                    </li>
                                    <li>
                                        <button id="#" data-bs-dismiss="modal"
                                            class="btn btn-danger btn-dim">Discard</button>
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
                            <h5 class="modal-title">Add Schedule</h5>
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


    @endsection
