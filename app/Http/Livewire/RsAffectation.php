<?php

namespace App\Http\Livewire;

use App\Models\Affectation;
use App\Models\User;
use Livewire\Component;

class RsAffectation extends Component
{
    public $editId=0;
    protected $listeners=['doAffectation'=>'update'];

    public function render()
    {
        $users=User::paginate(10);
        return view('livewire.rs-affectation',[
            'users'=>$users
        ]);
    }
    public function update()
    {
        $this->reset('editId');
    }
    public function affecter($id){
        $this->editId=$id;
    }
}
