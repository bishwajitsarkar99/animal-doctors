<?php

namespace App\Http\Controllers\Forntend\Footer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forntend\ForntEndFooter;

class FooterInformation extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $data = ForntEndFooter::first()->toArray();

            return \response()->json($data);
        }

        return view('super-admin.forntend.footer.footer_information');
    }


    public function update(Request $request) {

        $request->validate([

        ]);


        return \response()->json([
            'message' => "Footer content success"
        ]);
    }

    
}
