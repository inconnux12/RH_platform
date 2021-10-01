<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
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
        $lists=User::all();
        $users=[];
        foreach ($lists as $user) {
            if (!Cache::has('user-is-online-' . $user->id))
                array_push($users,$user);
        }
        return view('livewire.absence',['users'=>$users]);
    }
}
