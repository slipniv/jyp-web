<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Over;

class OverController extends Controller
{
    public function index()
    {
        return view('pages.over')->with(['dat' => Ongoing::all(), 'sched_arr' => Drivers::all(), 'ong' => Over::query()->with('deliver')->with('driver')->with('destination')->where('status_id', 4)->orderBy('overdate', 'desc')->orderBy('overtime', 'desc')->get(), 'area' => Destination::all()]);
    }

    public function search(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $query = Over::query()->select()->orderBy('overdate', 'desc')->orderBy('overtime', 'desc')->where('overdate', '>=', $fromDate)->where('overdate', '<=', $toDate)->get();
        return view('pages.over')->with(['dat' => Ongoing::all(), 'sched_arr' => Drivers::all(), 'ong' => $query , 'area' => Destination::all(), 'from' => $fromDate, 'to' => $toDate]);
    }
}
