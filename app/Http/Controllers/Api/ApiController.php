<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AuthServices;


class ApiController extends Controller
{

  public function __construct(public AuthServices $authServices )
  {
    
  }
  public function register(Request $request){
    return $this->authServices->register($request);
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
    return $this->authServices->logout();
    
  }
}
