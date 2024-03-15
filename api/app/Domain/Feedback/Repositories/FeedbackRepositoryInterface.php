<?php

namespace App\Domain\Feedback\Repositories;

use App\Domain\Feedback\Entities\FeedbackEntity;

interface FeedbackRepositoryInterface
{
    public function add(FeedbackEntity $feedback): void;

}
