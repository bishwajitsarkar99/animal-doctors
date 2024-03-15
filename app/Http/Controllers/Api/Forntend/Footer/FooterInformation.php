<?php

namespace App\Http\Controllers\Api\Forntend\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forntend\ForntEndFooter;

class FooterInformation extends Controller
{
    public function index(Request $request){

        $data = ForntEndFooter::first()->toArray();

        return \response()->json($data);
    }

    public function store(Request $request) {
        
        return abort(404);
    }


    public function show($id){

        return abort(404);
    }


    public function update(Request $request) {

        return abort(404);
        
    }

    public function destry($id) {
        
        return \abort(404);
    }
}
