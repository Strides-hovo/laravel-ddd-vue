<?php

namespace App\Domain\Feedback\Application\Http\Controllers;

use App\Domain\Feedback\Application\Factories\FeedbackFactory;
use App\Domain\Feedback\Exceptions\FeedBackMessagesEmpty;
use App\Domain\Feedback\Exceptions\FeedBackNamesEmpty;
use App\Domain\Feedback\Exceptions\FeedBackPhoneNotValid;
use App\Domain\Feedback\Exceptions\FeedBackPhonesEmpty;
use App\Domain\Feedback\Repositories\FeedbackRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeedbackController extends Controller
{
    /**
     * @throws FeedBackNamesEmpty
     * @throws FeedBackPhonesEmpty
     * @throws FeedBackMessagesEmpty|FeedBackPhoneNotValid
     */
    public function store(Request $request, FeedbackFactory $factory, FeedbackRepositoryInterface $repository): JsonResponse
    {

        $factory->add([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message')
        ], $repository);

        return response()->json(['status' => true]);
    }
}
