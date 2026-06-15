<?php

namespace App\Presentation\Controllers;

use Illuminate\Http\JsonResponse;

use App\Application\DTOs\Reply\CreateReplyDTO;
use App\Application\UseCases\Reply\{CreateReplyUseCase, GetRepliesByCommentUseCase};
use App\Presentation\Requests\Reply\CreateReplyRequest;
use App\Presentation\Resources\ReplyResource;

class ReplyController
{
    public function store(CreateReplyRequest $request, int $commentId, CreateReplyUseCase $useCase): JsonResponse {

        $dto = new CreateReplyDTO(
            userId: $request->user()->id,
            commentId: $commentId,
            content: $request->content,
        );

        $reply = $useCase->execute($dto);

        return response()->json([
            'message' => 'Reply created successfully',
            'reply' => new ReplyResource($reply),
        ], 201);
    }
}