<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        $user=User::find(auth()->user()->id);
        $user->status_id=1;
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    }
}
