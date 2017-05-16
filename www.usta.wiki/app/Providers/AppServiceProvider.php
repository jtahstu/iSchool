<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Course;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $courses = Course::all()->where('is_delete',0)->sortBy('sort');

        view()->share('courses',$courses);
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
