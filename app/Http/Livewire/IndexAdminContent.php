<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use Livewire\Component;

class IndexAdminContent extends Component
{
    public $motif="";
    public function render()
    {
        $conges=Conge::where('conge_status','1')->paginate(5);
        return view('livewire.index-admin-content',['conges'=>$conges]);
    }

    public function accord($id)
    {
        $conge=conge::find((int)$id);
        $conge->conge_status="2";
        $conge->save();
    }
    public function refuse($id){
        $conge=conge::find((int)$id);
        $conge->conge_status="3";
        $conge->motif=$this->motif;
        $conge->save();
    }
}
