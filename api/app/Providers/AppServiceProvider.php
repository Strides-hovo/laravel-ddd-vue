<?php

namespace App\Providers;

use App\Domain\Feedback\Repositories\FeedbackRepositoryInterface;
use App\Domain\Feedback\Repositories\FileEntity;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
