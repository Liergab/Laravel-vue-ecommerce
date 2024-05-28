<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Services\AddressServices;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function __construct(public AddressServices $addressServices){

    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->addressServices->index();
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        return $this->addressServices->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        return $this->addressServices->update($request, $address);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        return $this->addressServices->destroy($address);
    }
}
