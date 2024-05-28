<?php
namespace  App\Http\Services\Implementations;

use App\Http\Resources\AddressResource;
use App\Http\Services\AddressServices;
use App\Models\Address;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AddressImplementation implements AddressServices
{
   use AuthorizesRequests;

   public function index()
   {
        $user = auth()->user()->load('tasks');
        $address = Address::where('user_id',$user->id)->paginate(5);
       
        return AddressResource::collection($address);
   }

   public function store($request)
   {
         $validate = $request->validated();
         $user = auth()->user();

         $existingAddress = $user->addresses()->first();
         if ($existingAddress) {
               return response()->json([
                  'message' => 'User already has an address.'
               ], 400);
         }

        $address = auth()->user()->addresses()->create($validate);

         return response()->json([
            'message' => 'Address Added!',
            'data'    => $address
         ],201);
   }

   public function update($request, $address)
   {
      try {
         $this->authorize('update', $address);
      } catch (AuthorizationException $e) {
         return response()->json([
            'error' => 'Unauthorized',
            'message' => 'You do not have permission to update this Address.'
        ], 403);
      }

      $address->update($request->validated());

      return response()->json([
         'message' => 'Address Updated!',
         'data'    => AddressResource::make($address)
      ],200);
   }

   public function destroy($address)
   {

         $address->delete();

         return response()->json([
            'message' => 'Address Deleted!'
         ],200);
   }


}