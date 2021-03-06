<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexAdminContent extends Component
{
    use WithPagination;

    public $refuseId=0;
    protected $listeners=['refuseConge'=>'update'];
    
    public function paginationView()
    {
        return 'livewire.pagination';
    }
    public function update()
    {
        $this->reset('refuseId');
    }
    public function render()
    {
        $conges=Conge::where('conge_status','1')->paginate(7);
        return view('livewire.index-admin-content',['conges'=>$conges]);
    }

    public function refuse($id)
    {
        $this->refuseId=$id;
    }
     public function accord($id)
    {
        $conge=conge::find((int)$id);
        $conge->conge_status="2";
        $user=User::find($conge->user_id);
        $user->status_id=3;
        $user->save();
        $conge->save();
    }
    /*public function refuse($id,$motif){
        
        
    }
 */
}
