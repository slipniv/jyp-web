<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Drivers;
use App\Models\Destination;
use App\Models\Ongoing;
use App\Models\Over;
use App\Models\Completed;
use App\Http\Resources\LocationResource;

class LocationAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');

            $date = date('Y-m-d');
            $time = date('H:i:s');
        
        $query = Drivers::query()->where('tracknum',$request->get('number'))->first();
        $news = new Location();
        $news->longitude = $request->get('long');
        $news->latitude = $request->get('lat');
        $news->driver_id = $query->id;
        $news->save();
        $query2 = Ongoing::query()->with('driver')->with('destination')->where('driver_id', $query->id)->where('status_id', 3)->first();
        if(!empty($query2->id) && $query2->arrivalDate >= $date && number_format(floatval($query2->destination->latitude),3) == number_format(floatval($request->get('lat')),3) && number_format(floatval($query2->destination->longitude),3) == number_format(floatval($request->get('long')),3)){
            $news = Ongoing::find($query2->id);
            $news->status_id = 1;
            $news->save();

            $news = new Completed();
            $news->id = $query2->id;
            $news->deliver_id = $query2->id;
            $news->driver_id = $query2->driver_id;
            $news->destination_id = $query2->destination_id;
            $news->status_id = 1;
            $news->remarks = "Complete";
            $news->arrive = $date;
            $news->arrivet = $time;
            $news->save();
        }
        if(!empty($query2->id) && $query2->arrivalDate < $date && number_format(floatval($query2->destination->latitude),3) == number_format(floatval($request->get('lat')),3) && number_format(floatval($query2->destination->longitude),3) == number_format(floatval($request->get('long')),3)){
            $news = Ongoing::find($query2->id);
            $news->status_id = 4;
            $news->save();

            $news = new Over();
            $news->id = $query2->id;
            $news->deliver_id = $query2->id;
            $news->driver_id = $query2->driver_id;
            $news->destination_id = $query2->destination_id;
            $news->status_id = 4;
            $news->overdate = $date;
            $news->overtime = $time;
            $news->save();
        }
        return ['Message'=> 'Success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
