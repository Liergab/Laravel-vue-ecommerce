<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\ProductResource;
use App\Http\Services\ProductServices;
use App\Models\Product;

class ProductsImplementation implements ProductServices
{
   public function index()
   {
        $user = auth()->user();
        $product = Product::where('user_id', $user->id)
                          ->paginate(5);

        return response()->json(
            ProductResource::collection($product),200
        );
   }

   public function store($request)
   {
        $user = auth()->user();

        if( $user->role !== 'ADMIN'){

            return response()->json([
                'message' => 'You don\'t have permission to make a product, Your not an Admin! '
            ],409);

        }
        $validated = $request->validated();

        $tagArray = $validated['tags'];

        $tagsToSring = implode(', ', $tagArray);

        $product =  $user->products()->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'tags' => $tagsToSring
        ]);
        
        return ProductResource::make($product);
   }

   public function show($product)
   {
    return response()->json(ProductResource::make($product), 200);
   }

   public function update($request, $product)
   {
        $user = auth()->user();

        if( $user->role !== 'ADMIN'){
            return response()->json([
                'message' => 'You don\'t have permission to update a product, Your not an Admin! '
            ],409);
        }

        if($user->id !== $product->user_id){
            return response()->json([
                'message' => 'You don\'t have permission to update this product! '
            ],400);
        }

        $validated = $request->validated();

        $tagArray = $validated['tags'];

        $tagsToSring = implode(', ', $tagArray);

         $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'tags' => $tagsToSring
         ]);

         return response()->json([
            ProductResource::make($product)
         ],200);

   }

   public function destroy($product)
   {
        $user = auth()->user();

        if($user->role !== 'ADMIN'){
            return response()->json([
                'message' => 'You don\'t have permission to delete a product, Your not an Admin! '
            ],409);
        }

        if($user->id !== $product->user_id){
            return response()->json([
                'message' => 'You dont have premission to delete this Product'
            ], 409);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product Deleted'
        ],200);
   }
    
}