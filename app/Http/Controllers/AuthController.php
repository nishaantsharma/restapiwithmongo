<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth',['except'=>['login','register']]);
    }

    public function login(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'email' => 'bail|required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only(['email', 'password']);
        
        if (!$token = Auth::setTTL(7200)->attempt($credentials) ) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $validated =  $this->validate($request, [
            'email' => 'bail|required|unique:customer|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:12|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $request->merge([
            'password' => Hash::make($request->password)
        ]);   
        $request->request->remove('confirm_password');
        
        try{
            $customer = Customer::create($request->input());
            return "You are registered successfully";
        }catch(Exception $e){
            echo "Registration Unsuccessfull. Error:- " . $e;
        }    
        
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }

    public function customer()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'You are logged out successfully']);
    }

}