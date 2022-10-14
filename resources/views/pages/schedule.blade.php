@extends('main')

@section('content')
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Schedule</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#addEventPopup"><em class="icon ni ni-plus"></em><span>Add Schedule</span></a>
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
                                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                    </li><!-- li -->
                                </ul><!-- .btn-toolbar -->
                            </div><!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
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
                                <div class="nk-tb-col tb-col-md"><span class="tb-lead">Destination</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="tb-lead">Schedule Time</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="tb-lead">Schedule Date</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="tb-lead">Status</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="tb-leada">Action</span></div>
                            </div>
                            @foreach ($sched_arr as $dis)
                            <!-- .nk-tb-item -->
                            <div class="nk-tb-item">
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="sub-text">{{ $dis->id }}</span>
                                </div>
                                <div class="nk-tb-col">
                                    <span class="sub-text">1221 323N</span>   
                                </div>
                                <div class="nk-tb-col tb-col-mb">
                                    <span class="sub-text">Kramix</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="sub-text">Zamboanga</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">10:00 PM</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="sub-text">10 Feb 2020</span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-status text-success">Active</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="btn btn-trigger btn-icon md-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Message">
                                                <em class="icon ni ni-mail-fill"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick View</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
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
                        <h5 class="modal-title">Add Schedule</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="addEventForm" class="form-validate is-alter">
                            <div class="row gx-4 gy-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-06">Name</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="default-06">
                                                    @foreach ($sched_arr as $ad)
                                                    <option value="{{ $ad->name }}">{{ $ad->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-06">Destination</label>
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" id="default-06">
                                                    @foreach ($area as $dd)
                                                    <option value="{{ $dd->area }}">{{ $dd->area }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Date & Time</label>
                                        <div class="row gx-2">
                                            <div class="w-55">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-left">
                                                        <em class="icon ni ni-calendar"></em>
                                                    </div>
                                                    <input type="text" id="event-start-date" class="form-control date-picker" data-date-format="yyyy-mm-dd" required>
                                                </div>
                                            </div>
                                            <div class="w-45">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-left">
                                                        <em class="icon ni ni-clock"></em>
                                                    </div>
                                                    <input type="text" id="event-start-time" data-time-format="HH:mm:ss" class="form-control time-picker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="d-flex justify-content-between gx-4 mt-1">
                                        <li>
                                            <button id="addEvent" type="submit" class="btn btn-primary">Add Schedule</button>
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
@endsection