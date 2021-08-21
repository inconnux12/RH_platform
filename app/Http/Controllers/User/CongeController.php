<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Conge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function __construct()
    {
        
    }
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
        $this->validate($request,[
            'dst_adrs'=>'required',
            'conge_typ'=>'required',
        ]);
        
        $cong_day=$request->input('conge_typ')=='1'?30:2;
        $conge_typ=$request->input('conge_typ')=='1'?'annuel':'exceptionnel';
        $conge_raison=$request->input('conge_typ')=='1'?'0':$request->input('conge_raison');
        if($conge_typ=="annuel"&&$request->user()->conge_nbr<1){
            return back()->with('status','vous avez déja consomer votre congé annuel');
        }
        $start_date=$request->input('conge_start_date');
        $end_date=Carbon::createFromDate($request->input('conge_start_date'))->addDays($cong_day)->toDateString();
        $request->user()->conges()->create([
            'conge_type'=>$conge_typ,
            'dst_adrs'=>$request->dst_adrs,
            'conge_start_date'=>$start_date,
            'conge_end_date'=>$end_date,
            'conge_raison'=>$conge_raison
        ]);
        if($cong_day==30){
            $user=$request->user();
            $user->conge_nbr--;
            $user->save();
        }
        return redirect()->route('conge')->with('status','votre demande de congé a été enregister');
    }
    public function indexAdmin()
    {
        return view('user.conge.indexAdmin');
    }
}
