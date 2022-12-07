<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Completed;
use App\Models\Over;
  
class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard')->with(['driv' => Drivers::count(), 'on' => Ongoing::where('status_id', 3)->count(), 'co' => Completed::where('status_id', 1)->count(), 'pen' => Schedule::where('status',2)->count(), 'ov' => Over::where('status_id',4)->count()]);
    }
}