<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;

use App\Services\TaskService;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\CommentService;


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
