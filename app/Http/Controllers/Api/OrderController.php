<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderServices;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct(public OrderServices $orderServices)
    {
        
    }
    public function index()
    {
        return $this->orderServices
                    ->index();
    }
    public function store(Request $request)
    {
        return $this->orderServices->store();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
