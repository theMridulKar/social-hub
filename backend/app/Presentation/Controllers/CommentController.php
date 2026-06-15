<?php

namespace App\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use App\Application\DTOs\Comment\CreateCommentDTO;
use App\Application\UseCases\Comment\CreateCommentUseCase;
use App\Presentation\Requests\Comment\CreateCommentRequest;
use App\Presentation\Resources\CommentResource;

class CommentController
{
    public function store(CreateCommentRequest $request, int $postId, CreateCommentUseCase $useCase): JsonResponse {

        $dto = new CreateCommentDTO(
            userId: $request->user()->id,
            postId: $postId,
            content: $request->content,
        );

        $comment = $useCase->execute($dto);

        return response()->json([
            'message' => 'Comment created successfully',
            'comment' => new CommentResource($comment),
        ], 201);
    }
}
