<?php

namespace App\Domain\Feedback\Repositories;

use App\Domain\Feedback\Entities\FeedbackEntity;
use App\Models\FeedbackModel;

class DatabaseEntity implements FeedbackRepositoryInterface
{
    public function add(FeedbackEntity $feedback): void
    {
        FeedbackModel::create([
            'name' => $feedback->getName()->getValue(),
            'phone' => $feedback->getPhone()->getValue(),
            'message' => $feedback->getMessage()->getValue(),
        ]);
    }
}
