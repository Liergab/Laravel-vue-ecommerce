<?php

namespace App\Providers;

use App\Http\Services\AddressServices;
use App\Http\Services\AuthServices;
use App\Http\Services\CartItemServices;
use App\Http\Services\Implementations\AddressImplementation;
use App\Http\Services\Implementations\AuthImplementation;
use App\Http\Services\Implementations\CartItemImplementation;
use App\Http\Services\Implementations\ProductsImplementation;
use App\Http\Services\Implementations\TaskImplementation;
use App\Http\Services\ProductServices;
use App\Http\Services\TaskServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        TaskServices::class => TaskImplementation::class,
        AddressServices::class => AddressImplementation::class,
        AuthServices::class => AuthImplementation::class,
        ProductServices::class => ProductsImplementation::class,
        CartItemServices::class => CartItemImplementation::class
    ];
    
    /**
     * Register any application services.
     */
    public function register(): void
    {
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
