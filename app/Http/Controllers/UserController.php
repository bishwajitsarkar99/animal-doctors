<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogicBild\CommonUser\CommonUserService;

class UserController extends Controller
{
    protected $commonUserService;
    // inject Common User Service
    public function __construct(CommonUserService $commonUserService)
    {
        return $this->commonUserService = $commonUserService;
    }
    
    // User Home Page
    public function dashboard()
    {   
        return $this->commonUserService->viewDashboard();
    }

    // User Auth Account
    public function users()
    {
        return $this->commonUserService->user();
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
