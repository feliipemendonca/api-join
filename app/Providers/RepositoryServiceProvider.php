<?php

namespace App\Providers;

use App\Repository\CategoryProductRepository;
use App\Repository\Interfaces\CategoryProductRepositoryInterface;
use App\Repository\Interfaces\ProductRepositoryInterface;
use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryProductRepositoryInterface::class, CategoryProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
