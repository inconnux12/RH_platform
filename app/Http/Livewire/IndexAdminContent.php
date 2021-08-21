<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAdminContent extends Component
{
    use WithPagination;

    public $motif="";
    
    public function paginationView()
    {
        return 'livewire.pagination';
    }

    public function render()
    {
        $conges=Conge::where('conge_status','1')->paginate(7);
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
        $user=User::find(auth()->user()->id);
        $conge->conge_status="3";
        $conge->motif=$this->motif;
        $user->conge_nbr++;
        $user->save();
        $conge->save();
    }
}
