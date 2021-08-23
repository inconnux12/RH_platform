<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AbsencesController extends Controller
{
    public function index()
    {
        return view('user.absence.index');
    }
}
