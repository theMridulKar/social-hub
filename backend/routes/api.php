<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Presentation\Controllers\AuthController;
use App\Presentation\Controllers\PostController;
use App\Presentation\Controllers\CommentController;
use App\Presentation\Controllers\ReplyController;
use App\Presentation\Controllers\LikeController;
use App\Presentation\Controllers\FeedController;

// guest
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// auth protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Posts Create
    Route::post('/create-post', [PostController::class, 'store']);
    // Comment Create
    Route::post('/posts/{postId}/comments', [CommentController::class, 'store']);
    // Reply Create
    Route::post('/comments/{commentId}/replies', [ReplyController::class, 'store']);

    // like
    Route::post('/posts/{postId}/like', [LikeController::class, 'togglePostLike']);
    Route::post('/comments/{commentId}/like', [LikeController::class, 'toggleCommentLike']);
    Route::post('/replies/{replyId}/like', [LikeController::class, 'toggleReplyLike']);

    // feed
    Route::get('/feed', [FeedController::class, 'index']);
});