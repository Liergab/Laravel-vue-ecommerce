<?php

namespace App\Providers;

use App\Http\Services\AddressServices;
use App\Http\Services\AuthServices;
use App\Http\Services\Implementations\AddressImplementation;
use App\Http\Services\Implementations\AuthImplementation;
use App\Http\Services\Implementations\TaskImplementation;
use App\Http\Services\TaskServices;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        TaskServices::class => TaskImplementation::class,
        AddressServices::class => AddressImplementation::class,
        AuthServices::class => AuthImplementation::class
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
