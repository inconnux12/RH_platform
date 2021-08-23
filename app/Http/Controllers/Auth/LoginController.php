<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /* function __construct()
    {
        $this->middleware('guest');
    } */
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);

        if(!Auth::attempt($request->only('username','password'),$request->remember)){
            return back()->with('status','invalid username or password');
        }
        if($request->user()->status_id!=2){
            $request->user()->status_id=2;
            $request->user()->save();
        }
        return redirect()->route('dashboard');
    }
}
