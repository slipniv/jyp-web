<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Drivers;

class LocationController extends Controller
{

    public $reloadTimeout = 10;

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
