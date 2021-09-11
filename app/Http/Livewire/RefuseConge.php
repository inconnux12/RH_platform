<?php

namespace App\Http\Livewire;

use App\Models\Conge;
use App\Models\User;
use Livewire\Component;

class RefuseConge extends Component
{
    public $conge;

    protected $rules=[
        'conge.motif'=>'required'
    ];

    public function render()
    {
        return view('livewire.refuse-conge');
    }

    public function save()
    {
        /* dump($this->conge);
        exit; */
        $this->validate();
        $user=User::find($this->conge->user_id);
        $this->conge->conge_status="3";
        $user->conge_nbr++;
        $user->save();
        $this->conge->save();
        $this->emit('refuseConge');
    }
}
