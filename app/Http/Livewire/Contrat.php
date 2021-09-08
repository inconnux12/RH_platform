<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Contrat extends Component
{
    use WithPagination;

    protected $listeners = ['refreshComponent' => '$refresh','refreshrt'=>'onUpdated'];
    public $t_id=0;
    
    public function paginationView()
    {
        return 'livewire.pagination';
    }
    public function onUpdated()
    {
        $this->reset('t_id');
    }
    public function editId($id)
    {
        $this->t_id=$id;
    }
    public function render()
    {
        $users=User::paginate(5);
        return view('livewire.contrat',['users'=>$users]);
    }
}
