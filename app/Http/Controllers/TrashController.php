<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Ongoing;
use App\Models\Schedule;
use RealRashid\SweetAlert\Facades\Alert;

class TrashController extends Controller
{
    public function index()
    {
        return view('pages.trash')->with(['drv' => Drivers::all(), 'ong' => Ongoing::query()->with('driver')->with('destination')->where('status_id', 3)->get(), 'sch' => Schedule::all()]);
    }

    public function trash()
    {
        $ong = Drivers::onlyTrashed()->get();
        $data = compact('ong');
        return view('pages.trash')->with($data);
    }

    public function restore($id)
    {
        $ong = Drivers::withTrashed()->find($id);
        if(!is_null($ong)){
            $ong->restore();
        }
        return redirect('archive');
    }
}