<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller

{
    
    public function index()
    {
        return view('auth.login');
    }

    // public function registration()
    // {
    //     return view('auth.registration');
    // }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            Alert::success('Good Day Admin!','Welcome to Dashboard');

            return redirect()->intended('dashboard');
        }

        Alert::error('Invalid Email/Password', 'Please try again.');

        return redirect("login");


    }

    // public function postRegistration(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:1',
    //     ]);

    //     Alert::success('Account Created!','Please Login.');

    //     $data = $request->all();
    //     $check = $this->create($data);

    //     return redirect("login");
    // }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');

    }
}
