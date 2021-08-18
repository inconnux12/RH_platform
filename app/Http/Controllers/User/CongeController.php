<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function index()
    {
        $conges=User::find(auth()->user()->id)->conges;
        return view('user.conge.index',[
            'conges'=>$conges
        ]);
    }
    public function create()
    {
        return view('user.conge.create');
    }
    public function store(Request $request)
    {

    }
}
