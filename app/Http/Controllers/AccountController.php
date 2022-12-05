<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function index()
    {
        return view('pages.account')->with('user', User::all());
    }

    public function updateEmail(Request $request)
    {

        $this->validate($request, [
            'iemail' => 'string',
        ]);
        $auth = Auth::user();

        $user = User::find($auth->id);
        $user->email = $request->input('iemail');
        $user->save();
        Alert::success('Email Successfully Changed!');
        return redirect('account');
    }

    public function updatePass(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:1|string',
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            Alert::error('Current Password did not match');
            return redirect('account');
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            Alert::error('New Password cannot be same as your current password.');
            return redirect('account');
        }

        $user = User::find($auth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        Alert::success('Password Changed!');
        Auth::logout();
        return redirect('login');
    }
}
