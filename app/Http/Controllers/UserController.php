<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    

    
    
    public function list(Request $request)
    {
        
        return response()->json($request->user()->name);
    }

    public function update(Request $request , $id)
    {

    }

    public function check()
    {
        echo Auth::check();
    }

    public function getAllUser(){
        if($data = $this->userService->getAllUser()) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
    }

    public function updateUser(Request $data)
    {
        if($this->userService->update($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data->all()
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }
}   