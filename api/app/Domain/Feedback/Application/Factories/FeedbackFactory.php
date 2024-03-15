<?php

namespace App\Domain\Feedback\Application\Factories;

use App\Domain\Feedback\Entities\FeedbackEntity;
use App\Domain\Feedback\Exceptions\FeedBackMessagesEmpty;
use App\Domain\Feedback\Exceptions\FeedBackNamesEmpty;
use App\Domain\Feedback\Exceptions\FeedBackPhoneNotValid;
use App\Domain\Feedback\Exceptions\FeedBackPhonesEmpty;
use App\Domain\Feedback\Repositories\FeedbackRepositoryInterface;
use App\Domain\Feedback\ValueObject\Message;
use App\Domain\Feedback\ValueObject\Name;
use App\Domain\Feedback\ValueObject\Phone;

class FeedbackFactory
{
    /**
     * @throws FeedBackNamesEmpty
     * @throws FeedBackPhonesEmpty
     * @throws FeedBackMessagesEmpty|FeedBackPhoneNotValid
     */
    public function add(array $data, FeedbackRepositoryInterface $repository ): void
    {

        $feedback = new FeedbackEntity(
            new Name($data['name']),
            new Phone($data['phone']),
            new Message($data['message'])
        );

        $repository->add($feedback);

    }
}
