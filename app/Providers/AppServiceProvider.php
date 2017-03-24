<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\TaskRepository;
use App\Services\TaskService;

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
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(TaskRepository::class, TaskService::class);
        $this->app->singleton(UserRepository::class, UserService::class);
        $this->app->singleton(PostRepository::class, PostService::class);
        $this->app->singleton(CommentRepository::class, CommentService::class);
    }
}
