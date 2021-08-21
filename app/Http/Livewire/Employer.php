<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Employer extends Component
{
    use WithPagination;

    protected $listeners = ['refreshComponent' => '$refresh','refreshrt'=>'onUpdated'];
    public $t_id=0;

    public function onUpdated()
    {
        $this->reset('t_id');
    }
    public function editId($id)
    {
        $this->t_id=$id;
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
    }
    public function render()
    {
        $users=User::paginate(5);
        return view('livewire.employer',['users'=>$users]);
    }
}
