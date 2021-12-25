<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $account)
    {
        return view('account.index', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $account)
    {
        $valided = $request->validate([
            'username' => 'required|string|max:25',
            'password' => 'required|string|min:6',
            'oldpassword' => 'required'
        ]);

        if (Auth::user()->username == $account->username) {
            if (Hash::check($request['oldpassword'],$account->password)) {
                $nwpsw = Hash::make($request['password']);
                $account->update([
                    'username' => $request['username'],
                    'password' => $nwpsw
                ]);
                return back()->with('scssupdt','Your account has been successfully updated');
            }else{
                return back()->with('pswns','Your old password is wrong');
            }
        }else{
            return back()->while('accns', 'Your account not same');
        }


        dd('berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
