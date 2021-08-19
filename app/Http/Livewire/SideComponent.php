<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SideComponent extends Component
{
    public $currentUrl;
    public $sub;

    public function mount()
    {
        $this->currentUrl = explode('/',request()->route()->uri)[0];
        $this->sub=(explode('/',request()->route()->uri)[1]??'');
    }
    public function page()
    {
        return $this->currentUrl;

    }
    public function render()
    {
        return view('livewire.side-component',['url'=>$this->currentUrl]);
    }
}
