<?php

namespace App\Domain\Feedback\ValueObject;

use App\Domain\Feedback\Exceptions\FeedBackNamesEmpty;

final class Name
{

    /**
     * @throws FeedBackNamesEmpty
     */
    public function __construct(private readonly string $name)
    {
        $this->validateEmpty($this->name);
    }

    /**
     * @throws FeedBackNamesEmpty
     */
    private function validateEmpty(string $name): void
    {
        if (strlen($name) === 0){
            throw new FeedBackNamesEmpty();
        }
    }

    public function getValue(): string
    {
        return $this->name;
    }
}
