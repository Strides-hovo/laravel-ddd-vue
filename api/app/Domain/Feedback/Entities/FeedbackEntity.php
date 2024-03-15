<?php

namespace App\Domain\Feedback\Entities;

use App\Domain\Feedback\ValueObject\Message;
use App\Domain\Feedback\ValueObject\Name;
use App\Domain\Feedback\ValueObject\Phone;

class FeedbackEntity
{
    public function __construct(
        private readonly Name    $name,
        private readonly Phone   $phone,
        private readonly Message $message
    )
    {
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }
}
