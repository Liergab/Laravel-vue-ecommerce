<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\OrderResource;
use App\Http\Services\OrderServices;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderImplementation implements OrderServices
{
    public function index()
    {
        $user = auth()->user();

        $order = Order::where('user_id',$user->id)
                      ->paginate(5);

        return OrderResource::collection($order);
    }

    public function store()
    {
        try {
            $user = auth()->user();

            DB::beginTransaction();

            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Cart is Empty'], 400);
            }

            $totalPrice = $cartItems->reduce(function ($carry, $item) {
                return $carry + ($item->quantity * $item->product->price);
            }, 0);

            // Retrieve user's default shipping address
            $address = Address::find($user->default_shipping_address_id);

            if (!$address) {
                return response()->json(['message' => 'Update and set up your Billing and Shipping address'], 400);
            }

            // Create the order
            $order = auth()->user()->orders()->create([
                'net_amount' => $totalPrice,
                'address' => $address->country,
            ]);

            // Create order products
            foreach ($cartItems as $cartItem) {
                $order->order_products()->create([
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                ]);
            }

            // Create an order event
            $order->order_events()->create();

            // Delete cart items
            CartItem::where('user_id', $user->id)->delete();

            // Commit transaction
            DB::commit();

            return response()->json($order, 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Internal Error', 'error' => $e->getMessage()], 500);
        }
       
    }
}