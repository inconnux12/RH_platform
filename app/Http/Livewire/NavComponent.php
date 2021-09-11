<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavComponent extends Component
{
    public $showNotif=false;
    public $nbrUnreadNotif=0;
    public $user;

    public function mount($user)
    {
        $this->user=$user;
        $this->nbrUnreadNotif=count($this->user->UnreadNotifications);
        $this->nbrUnreadNotif>0?$this->showNotif=true:$this->showNotif=false;
    }

    public function markRead()
    {
        $this->user->unreadNotifications->markAsRead();
        $this->reset('showNotif','nbrUnreadNotif');
    }
    public function render()
    {
        $notifs=$this->user->notifications;
        return view('livewire.nav-component',['notifs'=>$notifs]);
    }
}
