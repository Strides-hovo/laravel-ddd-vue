<?php

namespace App\Domain\Feedback\Repositories;

use App\Domain\Feedback\Entities\FeedbackEntity;
use Illuminate\Support\Facades\Storage;

class FileEntity implements FeedbackRepositoryInterface
{

    const FILE_PATH = 'feedback.json';

    public function add(FeedbackEntity $feedback): void
    {
        $data = [
            'name' => $feedback->getName()->getValue(),
            'phone' => $feedback->getPhone()->getValue(),
            'message' => $feedback->getMessage()->getValue(),
        ];

        $fileContents = Storage::exists(self::FILE_PATH) ? json_decode(Storage::get(self::FILE_PATH), true) : [];

        $fileContents[] = $data;

        Storage::put(self::FILE_PATH, json_encode($fileContents, JSON_PRETTY_PRINT));
    }


}
