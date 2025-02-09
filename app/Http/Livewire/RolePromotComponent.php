<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RolePromotComponent extends Component
{
    protected $listeners = ['renderRolePromot' => 'reloadComponent'];

    public function reloadComponent()
    {
        $this->emit('$refresh'); // Refresh component
    }

    public function render()
    {
        return view('livewire.role-promot-component');
    }
}
