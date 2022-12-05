<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Completed;
use Carbon\Carbon;

class OngoingController extends Controller
{   
    
    public function index()
    {
        return view('pages.ongoing')->with(['sched_arr' => Drivers::all(), 'disp' => Ongoing::query()->with('driver')->with('delivery')->with('destination')->where('status_id', 3)->get(), 'area' => Destination::all()]);
    }

    public function update(Request $request, $id){

            date_default_timezone_set('Asia/Manila');

            $date = date('Y-m-d');
            $time = date('H:i:s');

        $news = Ongoing::findOrFail($id);
        $news->delivery_id = $id;
        $news->driver_id = $request->input('Drivername');
        $news->destination_id = $request->input('DestinationLoc');
        $news->startingDate = $request->input('dates');
        $news->arrivalDate = $request->input('datea');
        $news->status_id = $request->input('status');
        $news->save();
            if($request->input('status') == 1){
                $news = new Completed();
                $news->id = $id;
                $news->deliver_id = $id;
                $news->driver_id = $request->input('Drivername');
                $news->destination_id = $request->input('DestinationLoc');
                $news->status_id = $request->input('status');
                $news->remarks = $request->input('remark');
                $news->arrive = $date;
                $news->arrivet = $time;
                $news->save();
            }
        return redirect('ongoing');

    }
}
