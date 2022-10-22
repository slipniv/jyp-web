<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Driver;

class LocationController extends Controller
{
    public function index()
    {
        return view('pages.location')->with('loc', Location::query()->with('driver')->get());
    }
}
