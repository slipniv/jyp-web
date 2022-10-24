<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Schedule;
use App\Models\Destination;
use App\Models\Ongoing;
  
class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard')->with(['driv' => Drivers::count(), 'on' => Ongoing::count(), 'pen' => Schedule::count()]);
    }
}