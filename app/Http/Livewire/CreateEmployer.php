<?php

namespace App\Http\Livewire;

use App\Models\Poste;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateEmployer extends Component
{
    public $name='';
    public $username='';
    public $password='';
    public $password_confirmation='';
    public $address='';
    public $email='';
    public $poste='';
    public $role='';

    public $modal=false;
    protected $listeners = ['refresh' => 'reseatAll'];
    protected $rules = [
        'name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'password'=>'required|confirmed',
        'address'=> 'required',
        'poste'=>'required',
        'role'=>'required'
    ];

    public function reseatAll()
    {
        $this->reset(['name',
        'username',
        'email',
        'password',
        'address',
        'poste',
        'role']);
    }
    public function submit()
    {
        $this->validate();
        $user=User::create([
            'name'=>$this->name,
            'username'=>$this->username,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'user_adrs'=>$this->address,
            'role'=>$this->role
        ]);
        Poste::create([
            'poste_title'=>$this->poste,
            'user_id'=>$user->id
        ]);
        $this->emitUp('refreshComponent');
        $this->emit('refresh');
        $this->modal=false;
    }
    public function render()
    {
        return view('livewire.create-employer');
    }
}
