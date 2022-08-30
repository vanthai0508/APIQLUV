<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public $user;
    public function __construct(UserService $user)
    {
        $this->user = $user;
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
}
