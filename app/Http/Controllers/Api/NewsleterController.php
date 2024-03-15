<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Api\Newsleter;

class NewsleterController extends Controller
{
    
    public function store(Request $request) {

        $request->validate([
            // 'email' => 'string|min:6|max:255'
            'email' => 'required|email|unique:newsletters',
        ]);

        $data = Newsleter::where('email', $request->email)->first();

        if(\is_null($data)){
            Newsleter::create([
                'email' => $request->email,
            ]);
        }

        return \response()->json([
            'message' => 'Newsleter has added',
        ]);
        
    }
}
