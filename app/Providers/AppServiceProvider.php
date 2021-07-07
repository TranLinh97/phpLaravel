<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        View::share('categories',$categories);

        $categoriesHot = Category::where('c_hot',1)->get();
        View::share('categoriesHot',$categoriesHot);

        $menus = Menu::select('id','mn_name','mn_slug')->get();
        View::share('menus',$menus);
    }
}
