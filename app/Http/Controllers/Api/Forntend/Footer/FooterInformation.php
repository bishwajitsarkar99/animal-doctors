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

        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contract_number_one' => 'required|string|max:255',
            'contract_number_two' => 'required|string|max:255',
            'hot_number' => 'required|string|max:255',
            'whatsapp_number_one' => 'required|string|max:255',
            'whatsapp_number_two' => 'required|string|max:255',
            'facebook_address' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'youtube_chenel' => 'required|string|max:255',
            'facebook_link' => 'required|string|max:255',
            'messaner_link' => 'required|string|max:255',
            'whatsapp_link' => 'required|string|max:255',
            'linkedin_link' => 'required|string|max:255' 
        ]);

        ForntEndFooter::where('id', 1)->update([
            'company_name' => $request->input("company_name"),
            'company_address' => $request->input("company_address"),
            'email' => $request->input("email"),
            'contract_number_one' => $request->input("contract_number_one"),
            'contract_number_two' => $request->input("contract_number_two"),
            'hot_number' => $request->input("hot_number"),
            'whatsapp_number_one' => $request->input("whatsapp_number_one"),
            'whatsapp_number_two' => $request->input("whatsapp_number_two"),
            'facebook_address' => $request->input("facebook_address"),
            'linkedin' => $request->input("linkedin"),
            'youtube_chenel' => $request->input("youtube_chenel"),
            'facebook_link' => $request->input("facebook_link"),
            'messaner_link' => $request->input("messaner_link"),
            'whatsapp_link' => $request->input("whatsapp_link"),
            'linkedin_link' => $request->input("linkedin_link"), 
        ]);

        return \response()->json([
            'message' => "Footer content update success"
        ]);
    }

    public function destry($id) {
        return \abort(404);
    }
}
