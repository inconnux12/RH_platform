<?php

namespace App\Http\Livewire;

use App\Models\Affectation;
use App\Models\User;
use Livewire\Component;

class RsAffectation extends Component
{
    public $zone;
    public $type;

    public function render()
    {
        $users=User::paginate(10);
        return view('livewire.rs-affectation',[
            'users'=>$users
        ]);
    }

    public function affecter($id){
        Affectation::create([
            'affectation_type'=>$this->type,
            'user_id'=>$id,
            'affectation_status'=>'2',
            'zone_affectation'=>$this->zone
        ]);
        $user=User::find((int)$id);
        $user->zone_id=$this->zone;
        $user->save();
    }
}
