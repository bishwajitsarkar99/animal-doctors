<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarComponent extends Component
{
    // Account History Index
    public function navigateToAccountHistoryIndex()
    {
        $url = route('get_account-holders.action');
        $this->emit('navigateToAccountHistoryIndex', $url);
    }
    // Email Verification Index
    public function navigateToEmailVerificationIndex()
    {
        $url = route('emailVerification');
        $this->emit('navigateToEmailVerificationIndex', $url);
    }
    // Role Promot Index
    public function navigateToRoleIndex()
    {
        $url = route('role_index');
        $this->emit('navigateToRoleIndex', $url);
    }
    // Role Permission Index
    public function navigateToRolePermissionIndex()
    {
        $url = route('role_permission.index');
        $this->emit('navigateToRolePermissionIndex', $url);
    }
    // Role Manage Index
    public function navigateToRoleManageIndex()
    {
        $url = route('manageRole');
        $this->emit('navigateToRoleManageIndex', $url);
    }
    // User Access Index
    public function navigateToUserAccessIndex()
    {
        $url = route('superAdminUsers');
        $this->emit('navigateToUserAccessIndex', $url);
    }
    public function render()
    {
        return view('livewire.sidebar-component');
    }
}
