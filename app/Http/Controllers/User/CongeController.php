<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Conge;
use App\Models\User;
use App\Notifications\NotifyActions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

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
        $user=$request->user();
        $datas=$this->dataTraite($request->input(),$user);
        $request->user()->conges()->create([
            'conge_type'=>$datas->conge_typ,
            'dst_adrs'=>$request->dst_adrs,
            'conge_start_date'=>$datas->start_date,
            'conge_end_date'=>$datas->end_date,
            'conge_raison'=>$datas->conge_raison
        ]);
        if($datas->cong_day==30){
            $user->conge_nbr--;
            $user->save();
        }
        $this->sendNotif($user);
        return redirect()->route('conge')->with('status','votre demande de congé a été enregister');
    }
    public function indexAdmin()
    {
        return view('user.conge.indexAdmin');
    }

    private function dataTraite($inputs,$user)
    {
        $cong_day=$inputs['conge_typ']=='1'?30:2;
        $conge_typ=$inputs['conge_typ']=='1'?'annuel':'exceptionnel';
        $conge_raison=$inputs['conge_typ']=='1'?'0':$inputs['conge_raison'];
        $start_date=$inputs['conge_start_date'];
        $end_date=Carbon::createFromDate($inputs['conge_start_date'])->addDays($cong_day)->toDateString();
        if($conge_typ=="annuel"&&$user->conge_nbr<1){
            return back()->with('status','vous avez déja consomer votre congé annuel');
        }
        $datas= new stdClass;
        $datas->cong_day=$cong_day;
        $datas->conge_raison= $conge_raison;
        $datas->conge_typ=$conge_typ;
        $datas->start_date=$start_date;
        $datas->end_date=$end_date;
        return $datas;
    }

    private function sendNotif($user)
    {
        $admins=User::where(function($query){
            $query->where('role','=','1')
                  ->orWhere('role','=','2');
        })->get();
        foreach ($admins as $admin) {
            $admin->notify(new NotifyActions(Conge::latest('id')->first(),$user));    
        }
    }
}
