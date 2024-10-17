<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Accounts\AccountsServiceProvider;

class AccountsController extends Controller
{
    protected $accountsServiceProvider;

    // inject AccountsServiceProvider
    public function __construct(AccountsServiceProvider $accountsServiceProvider)
    {
        return $this->accountsServiceProvider = $accountsServiceProvider;
    }

    //Accounts Dashboard View
    public function dashboard()
    {   
        return $this->accountsServiceProvider->viewDashboard();
    }
}
