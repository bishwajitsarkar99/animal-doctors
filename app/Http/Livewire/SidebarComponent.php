<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarComponent extends Component
{
    protected $listeners = ['loadPage' => 'loadPage'];

    public function loadPage($component)
    {
        $this->emitTo($component, 'reloadComponent');
    }

    public function render()
    {
        return view('livewire.sidebar-component');
    }
}
