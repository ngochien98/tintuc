<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Theloai;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layout.header',function($view){
            $theloai_menu= Theloai::all();
            $view->with('theloai_menu',$theloai_menu);
        });
        view()->composer('layout.footer',function($view){
            $theloai_menu= Theloai::all();
            $view->with('theloai_menu',$theloai_menu);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
