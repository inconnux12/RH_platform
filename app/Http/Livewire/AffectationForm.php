<?php

namespace App\Http\Livewire;

use App\Models\Affectation;
use Livewire\Component;

class AffectationForm extends Component
{
    public $user;
    public $type;
    public $zone;

    protected $rules=[
        'type'=>'required',
        'zone'=>'required',
    ];
    public function render()
    {
        return view('livewire.affectation-form');
    }

    public function save()
    {
        $this->validate();
        Affectation::create([
            'affectation_type'=>$this->type,
            'user_id'=>$this->user->id,
            'affectation_status'=>'2',
            'zone_affectation'=>$this->zone
        ]);
        $this->user->zone_id=$this->zone;
        $this->user->save();
        $this->emit('doAffectation');
    }
}
