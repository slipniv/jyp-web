@extends('main')

@section('content')

        <script>
            
            function fnExcelReport()
                {
                    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
                    var textRange; var j=0;
                    tab = document.getElementById('schedule_data'); // id of table

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


        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Previous Deliveries Reports</h3>
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
            <table id="schedule_data" class="table table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>ID</td>
                        <td>Plate Number</td>
                        <td>Name</td>
                        <td>Destination</td>
                        <td>Schedule Time</td>
                        <td>Schedule Date</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disp as $dis)
                        <tr>
                            <td><h4></h4></td>
                            <td>{{ $dis->id }}</td>
                            <td style="text-transform:uppercase">{{ $dis->driver? $dis->driver->platenumber: ''}}</td>
                            <td>{{ $dis->driver? $dis->driver->fname: '' }} {{ $dis->driver? $dis->driver->lname: '' }}</td>
                            <td>{{ $dis->destination? $dis->destination->area: '' }}</td>
                            <td>{{ date('h:i A',strtotime($dis->time)) }}</td>
                            <td>{{ date('F j, Y',strtotime($dis->date)) }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script >

            $(document).ready(function() {
                $('#schedule_data').DataTable();

            } );
        </script>
@endsection