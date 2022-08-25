<?php
// app/Http/Controllers/AuthController.php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
 
class AuthController extends Controller
{

    // ham dang ky
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1,
        ]);

      //  dd($request);
 
        $user->save();
        return response()->json([
            'data' => $request->all(),
            'status' => 'success',
            
            'token_type' => 'Bearer',
            
        ]);
 
    }
    
    //ham dang nhap
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
 
        if ($validator->fails()) 
        {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $credentials = request(['email', 'password']);
 
        if (!Auth::attempt($credentials)) 
        {
            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized'
            ], 401);  
        }
 
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
 
        if ($request->remember_me) 
        {
            $token->expires_at = Carbon::now()->addWeeks(1); 
        }
 
        $token->save();
        
        return response()->json([
            'status' => 'success',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
 

    
    // ham dang xuat
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 'success',
        ]);
        
    }
 
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function list()
    {
        echo "thai";
    }
}