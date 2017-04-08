<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('required_weight', function($attribute, $value, $parameters, $validator) {

            if(!empty($value) && $value >= 65){

                return true;

            }

                return false;

        });

        Validator::extend('required_age', function($attribute, $value, $parameters, $validator) {

            if(!empty($value) && $value >= 16){

                return true;

            }

                return false;

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
