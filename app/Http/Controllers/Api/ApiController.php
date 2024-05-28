<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AuthServices;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{

  public function __construct(public AuthServices $authServices )
  {
    
  }
  public function register(Request $request){
     $validated = $request->validate([
        "name"     => "required|string",
        "email"    => "required|string|email|unique:users",
        "password" => "required|confirmed",
        "default_billing_address_id"  => "nullable",
        "default_shipping_address_id" => "nullable"
    ]);

    $user = User::create($validated);
    Mail::to($user->email)->send(new WelcomeMail($user));
    return response()->json([
        "data"         => $user,
        "status"       => true,
        "token_type"   => "Bearer",
        "access_token" => $user->createToken('api_token')->plainTextToken
    ], 201);
  }


  public function login(Request $request){
   return $this->authServices->login($request);
  }

  public function profile(){
    return $this->authServices->profile();
  }

  public function updateUser(Request $request)
  {
    return $this->authServices->updateProfile($request);
   
      
  }

  public function logout(){
    request()->user()->tokens()->delete();

    return response()->json([
      'message' => 'Logout'
    ]);
    
  }

  public function index (){
    return response()->json([
        "message" => 'hello from contoller'
    ]);
  }
}
