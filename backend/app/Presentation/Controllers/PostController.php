<?php

namespace App\Presentation\Controllers;

use App\Application\DTOs\Post\CreatePostDTO;
use App\Application\UseCases\Post\CreatePostUseCase;

use App\Presentation\Requests\Post\CreatePostRequest;
use App\Presentation\Resources\PostResource;

use Illuminate\Http\JsonResponse;

class PostController
{
    public function store(CreatePostRequest $request, CreatePostUseCase $useCase): JsonResponse {

        $dto = new CreatePostDTO(
            userId: $request->user()->id,
            content: $request->content,
            image: $request->image,
        );

        $post = $useCase->execute($dto);

        return response()->json([
            'message' => 'Post created successfully',
            'post'    => new PostResource($post),
        ], 201);
    }
}