<?php

namespace App\Providers;

use App\Repositories\Eloquent\FruitRepository;
use App\Repositories\Eloquent\OrderDetailRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\Eloquent\ShoppingCartRepository;
use App\Repositories\FruitRepo;
use App\Repositories\FruitRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\OrderDetailRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ShoppingCartDetailRepositoryInterface;
use App\Repositories\ShoppingCartRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(FruitRepositoryInterface::class, FruitRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderDetailRepositoryInterface::class, OrderDetailRepository::class);
        $this->app->bind(ShoppingCartRepositoryInterface::class, ShoppingCartRepository::class);
        $this->app->bind(ShoppingCartDetailRepositoryInterface::class, ShoppingCartDetailRepository::class);
    }
}