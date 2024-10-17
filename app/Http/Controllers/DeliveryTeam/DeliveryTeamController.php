<?php

namespace App\Http\Controllers\DeliveryTeam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\DeliveryTeam\DeliveryTeamServiceProvider;

class DeliveryTeamController extends Controller
{
    protected $deliverTeamServiceProvider;

    // inject DeliveryTeamServiceProvider
    public function __construct(DeliveryTeamServiceProvider $deliverTeamServiceProvider)
    {
        return $this->deliverTeamServiceProvider = $deliverTeamServiceProvider;
    }

    //Delivery Team Home Page View
    public function dashboard()
    {   
        return $this->deliverTeamServiceProvider->viewDashboard();
    }
}
