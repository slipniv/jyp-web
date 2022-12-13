<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use RealRashid\SweetAlert\Facades\Alert;

class DriversController extends Controller
{
    public function index()
    {
        return view('pages.drivers')->with('drivers_arr', Drivers::all());
    }

    public function add(Request $request){

        $query2 = Drivers::query()->where('contact',$request->input('contact'))->first();
        $query = Drivers::query()->where('platenumber',$request->input('platenumber'))->first();

        if(!empty($query)){
            Alert::error('Plate number already exists!');

            return redirect('drivers');
        }

        if(!empty($query2)){
            Alert::error('Contact number already exists!');

            return redirect('drivers');
        }

        if(empty($request->input('platenumber'))){
            Alert::error('Plate number is empty!');

            return redirect('drivers');
        }

        $newd = new Drivers();
        $newd->fname = $request->input('fname');
        $newd->lname = $request->input('lname');
        $newd->mname = $request->input('mname');
        $newd->platenumber = $request->input('platenumber');
        $newd->contact = $request->input('contact');
        $newd->tracknum = $request->input('tracknum');
        $newd->save();

        Alert::success('Driver added Successfully!');

        return redirect('drivers');

    }

    public function update(Request $request, $id){

        if(empty($request->input('platenumber'))){
            Alert::error('Plate number is empty!');

            return redirect('drivers');
        }

        try {
            $newd = Drivers::findOrFail($id);
            $newd->fname = $request->input('fname');
            $newd->lname = $request->input('lname');
            $newd->mname = $request->input('mname');
            $newd->platenumber = $request->input('platenumber');
            $newd->contact = $request->input('contact');
            $newd->tracknum = $request->input('tracknum');
            $newd->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            Alert::Error('Tracking or Contact number already Exists!');
            return redirect('drivers');//\Illuminate\Database\QueryException
        }

        

        Alert::success('Driver updated Successfully!');

        return redirect('drivers');

    }

    public function delete($id){
        $driver = Drivers::find($id);
        if(!is_null($driver)){
            $driver->delete();
        }

        Alert::error('Driver deleted Successfully!');

        return redirect('drivers');

    }
}
