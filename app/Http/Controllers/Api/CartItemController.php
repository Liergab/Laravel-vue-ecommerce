<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\CartItemServices;
use App\Models\CartItems;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
   public function __construct(public CartItemServices $cartItemServices)
   {
    
   }

    public function index()
    {
        return $this->cartItemServices->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItems $cartItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItems $cartItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItems $cartItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItems $cartItems)
    {
        //
    }
}
