<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $valided = $request->validate([
            'username' => 'required|string|max:25',
            'password' => 'required|string|min:6'
        ]);
        

        $password = bcrypt($valided['password']);

        $user = User::where([
            'username' => $valided['username']
        ]);

        $countuser = $user->count();

        if ($countuser > 0) {
            if (Auth::attempt($valided)) {
                $request->session()->regenerate();
                return redirect('/home')->with('loginscs','You have successfully logged in');
            }
            else{
                return back()->with('notlogin','Your password is wrong');
            }
        }else{
            User::create([
                'username' => $valided['username'],
                'password' => $password
            ]);
            if (Auth::attempt($valided)) {
                $request->session()->regenerate();
                return redirect('/home')->with('regisscs','Your account has been successfully registered');
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
