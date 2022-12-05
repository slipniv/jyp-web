<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Message;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.schedule')->with(['sched_arr' => Drivers::all(), 'disp' => Schedule::query()->with('driver')->with('destination')->where('status', 2)->get(), 'area' => Destination::all()]);
    }

    public function update(Request $request, $id){

        $news = Schedule::findOrFail($id);
        $news->driver_id = $request->input('Drivername');
        $news->destination_id = $request->input('DestinationLoc');
        $news->date = $request->input('date');
        $news->time = $request->input('time');
        $news->status = $request->input('status');
        $news->save();
            if($request->input('status') == 3){
                $news = new Ongoing();
                $news->id = $id;
                $news->delivery_id = $id;
                $news->driver_id = $request->input('Drivername');
                $news->destination_id = $request->input('DestinationLoc');
                $news->status_id = $request->input('status');
                $news->startingDate = Carbon::now();
                $news->arrivalDate = Carbon::now()->addDays(3);
                $news->save();
            }
        return redirect('schedule');

    }

    public function add(Request $request){

        $news = new Schedule();
        $news->driver_id = $request->input('Drivername');
        $news->destination_id = $request->input('DestinationLoc');
        $news->date = $request->input('date');
        $news->time = $request->input('time');
        $news->status = 2;
        $news->save();
        return redirect('schedule');

    }

    public function delete(Request $request, $id){

        Schedule::destroy($id);

        return redirect('schedule');

    }

    public function send(Request $request, $id){

        $news = new Message();
        $news->schedule_id = $id;
        $news->status = 0;
        $news->save();

        Alert::success('Message Sent!');

    }
}
