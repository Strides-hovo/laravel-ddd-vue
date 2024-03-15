<?php

namespace App\Http\Controllers;

use App\Domain\Feedback\Application\Factories\FeedbackFactory;
use App\Domain\Feedback\Repositories\DatabaseEntity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function store(Request $request, FeedbackFactory $factory): JsonResponse
    {

        $result = $factory->add(new DatabaseEntity($request->all()));

        return response()->json(['status' => true]);
    }
}
