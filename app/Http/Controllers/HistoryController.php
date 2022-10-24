<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index()
    {
        // Carbon::now()->addDays(3);
        return view('pages.history');
    }
}
