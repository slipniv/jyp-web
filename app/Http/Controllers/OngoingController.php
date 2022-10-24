<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
use App\Models\Ongoing;

class OngoingController extends Controller
{
    public function index()
    {
        return view('pages.ongoing')->with(['sched_arr' => Drivers::all(), 'disp' => Ongoing::query()->with('driver')->with('destination')->where('status_id', 3)->get(), 'area' => Destination::all()]);
    }
}
