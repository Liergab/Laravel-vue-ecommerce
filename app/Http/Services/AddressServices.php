<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AddressServices
{
    public function index();
    public function store($request);
    public function update($request, $address);
    public function destroy($address);
}