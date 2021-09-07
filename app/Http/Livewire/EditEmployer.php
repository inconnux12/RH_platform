<?php

namespace App\Http\Livewire;

use App\Models\Poste;
use App\Models\Zone;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditEmployer extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public $user;
    public $poste;
    protected $rules = [
        'user.name' => 'required',
        'user.username' => 'required',
        'user.password'=>'',
        'user.email' => 'required|email',
        'user.user_adrs'=> 'required',
        'poste.poste_title'=>'required',
        'user.zone_id'=>'required',
        'user.role'=>'required'
    ];
    public function submit()
    {
        $this->validate();
        $this->user->password=Hash::make($this->user->password);
        $this->user->save();
        $this->poste->save();
        $this->emitUp('refreshrt');
        $this->emit('refresh');
    }
    public function mount($user)
    {
        $this->user=$user;
        $this->poste=Poste::where('user_id',$this->user->id)->first();
    }
    public function render()
    {
        $zones=Zone::get();
        return view('livewire.edit-employer')->with('zones',$zones);
    }
}
