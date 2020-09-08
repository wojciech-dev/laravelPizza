<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
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
        view()->composer('modules/menu', function ($view) {

            $category = Category::published()->get(['name', 'slug']);

            return $view->with([
                'category' => $category,
            ]);
        });
    }
}
