<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface CartItemServices
{
    public function index();
    public function show($cartItem);
    public function store($request);
    public function updatecart($request, $cartItem);
    public function destroy($cartItem);
}