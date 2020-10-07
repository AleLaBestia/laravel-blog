<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('admin.users.index',function($view){
            $view->with('users', User::all());
        });

        View::composer('admin.users.edit',function($view){
            $view->with('roles', Roles::all());
        });

        View::composer('posts.index',function($view){
            $view->with('users', User::all());
        });
    }
}
