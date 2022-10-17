<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
  
class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.schedule')->with(['sched_arr' => Drivers::all(), 'disp' => Schedule::query()->with('driver')->with('destination')->get(), 'area' => Destination::all()]);
    }

    public function update(Request $request, $id){

        $news = Schedule::findOrFail($id);
        $news->driver_id = $request->input('Drivername');
        $news->destination_id = $request->input('DestinationLoc');
        $news->date = $request->input('date');
        $news->time = $request->input('time');
        $news->save();
        return redirect('schedule');

    }

    public function add(Request $request){

        $news = new Schedule();
        $news->driver_id = $request->input('Drivername');
        $news->destination_id = $request->input('DestinationLoc');
        $news->date = $request->input('date');
        $news->time = $request->input('time');
        $news->save();
        return redirect('schedule');

    }

    public function delete(Request $request, $id){

        Schedule::destroy($id);

        return redirect('schedule');

    }
}