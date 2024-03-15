<?php

namespace App\Domain\Feedback\Exceptions;

class FeedBackPhoneNotValid extends \Exception implements \Throwable
{

    public function __toString(): string
    {
        return 'Phone number not valid';
    }

}
