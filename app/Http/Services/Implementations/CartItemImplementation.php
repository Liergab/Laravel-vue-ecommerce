<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\CartItemResource;
use App\Http\Services\CartItemServices;
use App\Models\CartItems;

class CartItemImplementation implements CartItemServices
{
    public function index()
    {
        $user = auth()->user();

        $cartItem = CartItems::where('user_id', $user->id)->paginate(5);

        return response()->json(CartItemResource::collection($cartItem),200);
    }
    
}