<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexAbsences()
    {
        return view('pages.absences');
    }

    public function indexVacations()
    {
        return view('pages.vacations');
    }
    
    public function indexUsers()
    {
        return view('pages.users');
    }

    public function indexContracts()
    {
        return view('pages.contracts');
    }
    
}
