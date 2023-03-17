<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function changePassword(Request $request)
    {
        return view('auth.change-password');
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:6|string'
        ]);
        $auth = Auth::user();

        // The passwords match
        if (!Hash::check($request->get('current_password'), $auth->password))
        {
            return back()->with('error', "Current Password is Invalid");
        }

// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0)
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('welcome');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $current_user=Photo::all()->where('userid', '=', Auth::id())->last();

            if(!$current_user){
                $real_path='/images/user.png';
            }else{
                $real_path="/storage/images/".$current_user->path;
            }

            $posts = [
                'user'=>Auth::user(),
                'image'=>URL::to('/').$real_path,
                //'id' => Auth::id(),
            ];

            return view('main')->with('posts', $posts);
        }

        return redirect("welcome");
    }

    public function welcome()
    {
        return view('welcome');
    }
}
