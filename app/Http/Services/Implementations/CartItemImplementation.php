<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\CartItemResource;
use App\Http\Services\CartItemServices;
use App\Models\CartItem;

class CartItemImplementation implements CartItemServices
{
    public function index()
    {
        $user = auth()->user();

        $cartItem = CartItem::where('user_id', $user->id)
                            ->with('product')
                            ->paginate(5);

        return response()->json(CartItemResource::collection($cartItem),200);
    }

    public function show($cartItem)
    {
        $user = auth()->user();

        if($user->id !== $cartItem->user_id){
            return response()->json([
                'message' => 'You dont have permission to get the other cart of user!'
            ],403);
        }
        $cartItem->load('product');
        return response()->json(CartItemResource::make($cartItem), 200);
    }

    public function store($request)
    {
        $validated = $request->validated();

        $existingCartItem = auth()->user()
                                  ->cartItems()
                                  ->where('product_id', $validated['product_id'])
                                  ->first();
        if($existingCartItem){
            return response()->json([
                'message' => 'The product is already in cart!'
            ]);
        }

        $cart = auth()->user()
                      ->cartItems()
                      ->create($validated);

        return response()->json(CartItemResource::make($cart));
    }

    public function updatecart($request, $cartItem)
    {
        $user = auth()->user();
        if($user->id !== $cartItem->user_id){
            return response()->json([
                'message' => 'You cant update this quantity!'
            ]);
        }
        $cartItem->update($request->validated());

        return response()->json([
            'data' => CartItemResource::make($cartItem)
        ]);
    }


    public function destroy($cartItem)
    {
        $user = auth()->user();

        if($user->id !== $cartItem->user_id){
            return response()->json([
                'message' => 'You cant update this quantity!'
            ]);
        }

        $cartItem->delete();

        return response()->json([
            'message' => 'Cart Deleted!'
        ],200);
    }
    
}