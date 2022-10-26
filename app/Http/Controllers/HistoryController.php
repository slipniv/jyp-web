<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Completed;

class HistoryController extends Controller
{
    public function index()
    {
        return view('pages.history')->with(['dat' => Ongoing::all(), 'sched_arr' => Drivers::all(), 'ong' => Completed::query()->with('ongoing')->with('driver')->with('destination')->get(), 'area' => Destination::all()]);
    }
}
