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
    
    public function index()
    {
        return $this->addressServices
                    ->index();
    }
    public function store(StoreAddressRequest $request)
    {
        return $this->addressServices
                    ->store($request);
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        return $this->addressServices
                    ->update($request, $address);
    }

    public function destroy(Address $address)
    {
        return $this->addressServices
                    ->destroy($address);
    }
}
