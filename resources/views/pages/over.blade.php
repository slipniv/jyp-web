@extends('main')

@section('content')

        <script>
                    
            function fnExcelReport()
                {
                    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
                    var textRange; var j=0;
                    tab = document.getElementById('overdue_data'); // id of table

                    for(j = 0 ; j < tab.rows.length ; j++) 
                    {     
                        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                        //tab_text=tab_text+"</tr>";
                    }

                    tab_text=tab_text+"</table>";
                    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
                    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
                    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

                    var ua = window.navigator.userAgent;
                    var msie = ua.indexOf("MSIE "); 

                    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
                    {
                        txtArea1.document.open("txt/html","replace");
                        txtArea1.document.write(tab_text);
                        txtArea1.document.close();
                        txtArea1.focus(); 
                        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
                    }  
                    else                 //other browser not tested on IE 11
                        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

                    return (sa);
                }
        </script>

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

        <form action="searchDate" method="POST">
            @csrf
            <br>
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group row1">
                        <label for="date" class="col-form-label col-sm-2">Starting Date</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" value="{{isset($from)?$from:''}}" required/>
                        </div>
                        <label for="date" class="col-form-label col-sm-2">End Date</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control input-sm" id="toDate" name="toDate" value="{{isset($to)?$to:''}}" required/>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" role="button" class="button-80" name="search" title="Search">🔎︎</button>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" href="#" class="myButton"  onclick="fnExcelReport();">Excel</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </form>

        <div class="table-responsive">
            <table id="overdue_data" class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Destination</td>
                        <td><center>Status</center></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ong as $dis)
                        <tr>
                            <td>{{ $dis->id }}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ $dis->destination? $dis->destination->area: '' }}</td>
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
                $('#overdue_data').DataTable();
            });
        </script>


@endsection
