<?php

namespace App\Domain\Feedback\ValueObject;

use App\Domain\Feedback\Exceptions\FeedBackPhoneNotValid;
use App\Domain\Feedback\Exceptions\FeedBackPhonesEmpty;

final class Phone
{
    /**
     * @throws FeedBackPhonesEmpty
     * @throws FeedBackPhoneNotValid
     */
    public function __construct(private readonly string $phone)
    {
        $this->validateEmpty($this->phone);
        $this->validatePhoneNumber($this->phone);
    }


    public function getValue(): string
    {
        return $this->phone;
    }

    /**
     * @throws FeedBackPhonesEmpty
     */
    private function validateEmpty(string $phone): void
    {
        if (strlen($phone) === 0){
            throw new FeedBackPhonesEmpty();
        }
    }

    /**
     * @throws FeedBackPhoneNotValid
     */
    private function validatePhoneNumber(string $phone): void
    {
        if (!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)){
            throw new FeedBackPhoneNotValid();
        }
    }
}
