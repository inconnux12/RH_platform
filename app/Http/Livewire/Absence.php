<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Absence extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'livewire.pagination';
    }
    
    public function render()
    {
        $users=User::where('status_id',1)->paginate(5);
        return view('livewire.absence',['users'=>$users]);
    }
}
