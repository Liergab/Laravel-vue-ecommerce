<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Services\ProductServices;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(public ProductServices $productServices)
    {
        
    }
    public function index()
    {
        return $this->productServices
                    ->index();
    }
    
    public function store(StoreProductRequest $request)
    {
        return $this->productServices
                    ->store($request);
    }
   
    public function show(Product $product)
    {
        return $this->productServices
                    ->show($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        return $this->productServices
                    ->update($request, $product);
    }
    
    public function destroy(Product $product)
    {
        return $this->productServices
                    ->destroy($product);
    }
}
