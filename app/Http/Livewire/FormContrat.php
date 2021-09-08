<?php

namespace App\Http\Livewire;

use App\Models\Contrat;
use Livewire\Component;

class FormContrat extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public $user;
    public $type;
    public $start;
    public $end;
    protected $rules = [
        'type' => 'required',
        'start' => 'required',
        'end'=>''
    ];
    public function submit()
    {
        if(!isset($this->user->contrat->id))
            $contrat=Contrat::create([
                'user_id'=>$this->user->id,
                'contrat_start_date'=>$this->start,
                'contrat_end_date'=>$this->end,
                'contrat_type'=>$this->type,
            ]);
        else{
            $contrat=Contrat::find($this->user->contrat->id);
            $contrat->contrat_start_date=$this->start;
            $contrat->contrat_end_date=$this->end;
            $contrat->contrat_type=$this->type;
            $contrat->save();
        }
        $this->emitUp('refreshrt');
        $this->emit('refresh');
    }
    public function mount($user)
    {
        $this->user=$user;
    }
    public function render()
    {
        return view('livewire.form-contrat');
    }
}
