<?php

namespace App\Providers;

use App\Announce;
use App\Http\Controllers\AnnounceController;
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

        $announce = Announce::getDescOne();
        view()->share('announce',$announce['title']);
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
