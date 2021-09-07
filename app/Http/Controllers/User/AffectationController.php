<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AffectationController extends Controller
{
    public function __construct()
    {
        $zones = Zone::get();

    // Sharing is caring
        View::share('zones', $zones);
    }
    public function index()
    {
        $affectations=User::find(auth()->user()->id)->affectations;
        $zones=Zone::get();
        return view('user.affectation.index',[
            'affectations'=>$affectations
        ]);
    }
    public function create()
    {
        return view('user.affectation.create');
    }
    public function store(Request $request)
    {
        $user=$request->user();
        if($user->affectation_nbr<1){
            return redirect()->route('affectation')->with('status','vous avez deja effecuter une demande d\'affection');   
        }
        $this->validate($request,[
            'zone'=>'required',
        ]);

        $request->user()->affectations()->create([
            'zone_affectation'=>$request->zone,
        ]);
        $user->affectation_nbr--;
        $user->save();
        return redirect()->route('affectation')->with('status','votre demande d\' affectation a été enregister');
    }
    public function indexAdmin()
    {
        return view('user.affectation.indexAdmin');
    }
    public function responsable_affectation()
    {
        return view('user.affectation.rs_affectation');
    }
}
