<?php

namespace App\Http\Controllers;

use App\Support\Facades\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $settings = Setting::all();

        if($request->ajax()){
            return response()->json([
                'data' => $settings,
                'code' =>200,
            ]);
        }

        return view('super-admin.setting.index', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'required',
        ]);

        // $data = [];
        foreach ($request->input('settings') as $item) {
            // $key = $item['key'];
            // $data[$key] = $item['value'];
            Setting::set($item['key'], $item['value']);
        }

        // setting( $data);

        $message = 'Setting update success';
        if($request->ajax()){
            return response()->json([
                'message' =>  $message,
                'code' =>200,
            ]);
        }

        return redirect()->route('')->with('success',  $message);
    }
}
