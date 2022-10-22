<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;

class DriversController extends Controller
{
    public function index()
    {
        return view('pages.drivers')->with('drivers_arr', Drivers::all());
    }

    public function add(Request $request){

        $newd = new Drivers();
        $newd->name = $request->input('name');
        $newd->platenumber = $request->input('platenumber');
        $newd->contact = $request->input('contact');
        $newd->color = $request->input('color');
        $newd->save();
        return redirect('drivers');

    }

    public function update(Request $request, $id){

        $newd = Drivers::findOrFail($id);
        $newd->name = $request->input('name');
        $newd->platenumber = $request->input('platenumber');
        $newd->contact = $request->input('contact');
        $newd->color = $request->input('color');
        $newd->save();
        return redirect('drivers');

    }

    public function delete(Request $request, $id){
        Drivers::destroy($id);

        return redirect('drivers');

    }
}
