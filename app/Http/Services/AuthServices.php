<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AuthServices
{
   public function login($request);
   public function register($request);
   public function profile();
   public function updateProfile($request);
}