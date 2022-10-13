<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }
    public function history()
    {
        return view('pages.history');
    }
    public function loc()
    {
        return view('pages.location');
    }
    public function sched()
    {
        return view('pages.schedule');
    }
}