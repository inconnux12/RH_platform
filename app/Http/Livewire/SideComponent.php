<?php

namespace App\Http\Livewire;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SideComponent extends Component
{
    public $currentUrl;
    public $sub;
    public $show=false;
    public $show2=false;

    public function mount()
    {
        $this->currentUrl = explode('/',request()->route()->uri)[0];
        $this->sub=(explode('/',request()->route()->uri)[1]??'');
        $this->keepOpen();
    }
    public function page()
    {
        return $this->currentUrl;

    }
    public function keepOpen()
    {
        if($this->currentUrl=="conge")
            $this->show=true;
        else if($this->currentUrl=="affectation")
            $this->show2=true;
        else
            $this->show=false;
    }
    public function render()
    {
        return view('livewire.side-component',['url'=>$this->currentUrl]);
    }
}
