<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Drivers;

class LocationController extends Controller
{
    public function index()
    {
        $query = Drivers::query()->get();
        foreach($query as $q){
            $loc= Location::query()->where('driver_id',$q->id)->orderby('id','DESC')->first();
            $q->location =$loc;
        }
        return view('pages.location')->with('loc', $query);
    }
}
