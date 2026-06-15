<?php

namespace App\Presentation\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Application\DTOs\Like\ToggleLikeDTO;
use App\Application\UseCases\Like\ToggleLikeUseCase;

class LikeController
{
    public function togglePostLike(int $postId, Request $request, ToggleLikeUseCase $useCase): JsonResponse {

        $dto = new ToggleLikeDTO(
            userId: $request->user()->id,
            likeableId: $postId,
            likeableType: 'post',
        );

        $result = $useCase->execute($dto);
        return response()->json($result);
    }

    public function toggleCommentLike(int $commentId, Request $request, ToggleLikeUseCase $useCase): JsonResponse {

        $dto = new ToggleLikeDTO(
            userId: $request->user()->id,
            likeableId: $commentId,
            likeableType: 'comment',
        );

        $result = $useCase->execute($dto);
        return response()->json($result);
    }

    public function toggleReplyLike(int $replyId, Request $request, ToggleLikeUseCase $useCase): JsonResponse {

        $dto = new ToggleLikeDTO(
            userId: $request->user()->id,
            likeableId: $replyId,
            likeableType: 'reply',
        );

        $result = $useCase->execute($dto);
        return response()->json($result);
    }
}