<?php

namespace App\Http\Livewire;

use App\Models\Affectation;
use App\Models\User;
use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class RsListAffectation extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'livewire.pagination';
    }

    public function render()
    {
        $affectations=Affectation::where('affectation_status','1')->paginate(7);
        $zones=Zone::get();
        return view('livewire.rs-list-affectation',[
            'affectations'=>$affectations,
            'zones'=>$zones
        ]);
    }

    public function accord($id)
    {
        $affectation=Affectation::find((int)$id);
        $affectation->affectation_status="2";
        $user=User::find($affectation->user_id);
        $user->zone_id=$affectation->zone_affectation;
        $user->save();
        $affectation->save();
    }
    public function refuse($id){
        $affectation=Affectation::find((int)$id);
        $user=User::find($affectation->user_id);
        $affectation->affectation_status="3";
        $user->affectation_nbr++;
        $user->save();
        $affectation->save();
    }
}
