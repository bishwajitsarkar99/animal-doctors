<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
class UserController extends Controller
{
    // User Home Page
    public function dashboard()
    {   
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('user.dashboard',compact('company_profiles'));
    }

    // User Auth Account
    public function users()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('user.update-account.index',compact('company_profiles'));
    }
    // Get User
    // public function getusers()
    // {
    //     if(Auth::user()){
    //         $users_accounts = User::where('status','=',0)->get();
    //         if($users_accounts){
    //             return response()->json(
    //                 [
    //                     'data'=>$users_accounts
    //                 ]
    //             );
    //         }
    //         else
    //         {
    //             return response()->json([
    //                 'status'=>404,
    //                 'messages'=>'Data Not Found'
    //             ]);
    //         }
    //     } 
    // }

    // Edit Users Data-----------
    // public function edituser($id){
    //     $users = User::find( $id);
        
    //     if($users)
    //     {
    //         return response()->json([
    //             'status' =>200,
    //             'messages' =>$users,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status' => 404,
    //             'messages' =>'Doctor is not found!',
    //         ]);
    //     }
    // }
}
