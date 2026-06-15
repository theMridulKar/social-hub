<?php

namespace App\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use App\Application\UseCases\Feed\GetFeedUseCase;
use App\Presentation\Resources\FeedResource;

class FeedController
{
    public function index(GetFeedUseCase $useCase): JsonResponse {

        $feed = $useCase->execute();

        return response()->json([
            'data' => FeedResource::collection($feed),
        ]);
    }
}