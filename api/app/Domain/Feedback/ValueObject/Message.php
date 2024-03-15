<?php

namespace App\Domain\Feedback\ValueObject;

use App\Domain\Feedback\Exceptions\FeedBackMessagesEmpty;

final class Message
{
    /**
     * @throws FeedBackMessagesEmpty
     */
    public function __construct(private readonly string $message)
    {
        $this->validateEmpty($this->message);
    }

    public function getValue(): string
    {
        return $this->message;
    }


    /**
     * @throws FeedBackMessagesEmpty
     */
    private function validateEmpty(string $message): void
    {
        if (strlen($message) === 0){
            throw new FeedBackMessagesEmpty();
        }
    }
}
