<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItem\StoreCartItemRequest;
use App\Http\Requests\CartItem\UpdateCartItemRequest;
use App\Http\Resources\CartItemResource;
use App\Http\Services\CartItemServices;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
   public function __construct(public CartItemServices $cartItemServices)
   {
    
   }

    public function index()
    {
        return $this->cartItemServices
                    ->index();
    }

    public function store(StoreCartItemRequest $request)
    {
        return $this->cartItemServices
                    ->store($request);
    }

    public function show(CartItem $cartItem)
    {
        return $this->cartItemServices->show($cartItem);
    }

    public function update(StoreCartItemRequest $request, CartItem $cartItem)
    {
        return $this->cartItemServices->updatecart($request, $cartItem);
    }


    public function destroy(CartItem $cartItem)
    {
        return $this->cartItemServices->destroy($cartItem);
    }
}
