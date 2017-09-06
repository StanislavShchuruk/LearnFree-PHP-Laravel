<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Repositories\IUserRepository', 'App\Repositories\UserRepository');
        
        $this->app->bind('App\Contracts\Repositories\ICourseRepository', 'App\Repositories\CourseRepository');
        $this->app->bind('App\Contracts\Repositories\ILessonRepository', 'App\Repositories\LessonRepository');
        
        $this->app->bind('App\Contracts\Repositories\ILocationRepository', 'App\Repositories\LocationRepository');
        $this->app->bind('App\Contracts\Repositories\IShowNameTypeRepository', 'App\Repositories\ShowNameTypeRepository');
        $this->app->bind('App\Contracts\Repositories\IGenderRepository', 'App\Repositories\GenderRepository');
    }
    
    
}
