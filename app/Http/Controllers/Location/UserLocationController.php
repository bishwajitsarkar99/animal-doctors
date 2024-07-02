<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserLocationController extends Controller
{
    // User Loaction
    public function location(Request $request)
    {
        
        $serverReport = $request->ip();
        $userLocation = Location::get($serverReport);
        dd($userLocation);

        return view('super-admin.user-location.location', compact('userLocation'));
    }
}
