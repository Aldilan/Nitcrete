<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Share;

class DashboardController extends Controller
{
    public function index()
    {
        $ket = 'notdirect';
        return view('dashboard.index',compact('ket')); 
    }

    public function indexa()
    {
        $shares = Share::page('http://nitcrete.test/home/Aldilan','asu')
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram()->getRawLinks();

        $users = User::where(
            'username', Auth::user()->username
        )->get();
        
        $messages = Message::where(
            'to', Auth::user()->username
        )->get();

        $replies = Reply::all();
        $ket = 'notdirect';

        $countmessage = $messages->count();
        if ($countmessage > 0) {
            $msg = "You have message";
            $i = 1;
            return view('dashboard.index',compact('users','messages','msg','replies','i','ket','shares'));
        }else{
            $msg = "You dont have message rn, dont be sad :)";
            return view('dashboard.index',compact('users','messages','msg','replies','ket','shares'));
        }
    }
    
    public function indexkey(Request $request)
    {
        $username = $request->key;
        $users = User::where(
            'username', $username
        )->get();

        $countuser = $users->count();


        if ($countuser > 0) {            
            $messages = Message::where(
                'to', $username
            )->get();

            $replies = Reply::all();

            $ket = "direct";

            $countmessage = $messages->count();

            if ($countmessage > 0) {
                $msg = "You have message";
                $i = 1;
                return view('dashboard.index',compact('users','messages','msg','replies','i','ket'));
            }else{
                $msg = "You dont have message rn, dont be sad :)";
                return view('dashboard.index',compact('users','messages','msg','replies','ket'));
            }
        }else{
            return abort('403');
        }
    }
}
