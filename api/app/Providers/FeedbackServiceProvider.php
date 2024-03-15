<?php

namespace App\Providers;

use App\Domain\Feedback\Repositories\DatabaseEntity;
use App\Domain\Feedback\Repositories\FeedbackRepositoryInterface;
use App\Domain\Feedback\Repositories\FileEntity;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider  extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            FeedbackRepositoryInterface::class,
            DatabaseEntity::class
        );
    }
}
