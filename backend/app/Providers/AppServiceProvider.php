<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// auth
use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\UserRepository;

use App\Domain\Services\Auth\{PasswordHasherInterface, TokenServiceInterface};
use App\Infrastructure\Services\Auth\{BcryptPasswordHasher, SanctumTokenService};

// post
use App\Domain\Repositories\PostRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\PostRepository; 

// comment
use App\Domain\Repositories\CommentRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\CommentRepository;

// reply
use App\Domain\Repositories\ReplyRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\ReplyRepository;

// like
use App\Domain\Repositories\LikeRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\LikeRepository;

// feed
use App\Domain\Repositories\FeedRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\FeedRepository;

use Illuminate\Database\Eloquent\Relations\Relation;
use \App\Infrastructure\Persistence\Models\Post;
use \App\Infrastructure\Persistence\Models\Comment;
use \App\Infrastructure\Persistence\Models\Reply;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         /**
         * Auth
         */

        // user repository
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        // password hasher
        $this->app->bind(
            PasswordHasherInterface::class,
            BcryptPasswordHasher::class
        );

        // token service
        $this->app->bind(
            TokenServiceInterface::class,
            SanctumTokenService::class
        );

        /**
         * Post
         */
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        /**
         * Comment
         */
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
        );

        /**
         * Reply
         */
        $this->app->bind(
            ReplyRepositoryInterface::class,
            ReplyRepository::class
        );

        /**
         * like 
         */
        $this->app->bind(
            LikeRepositoryInterface::class,
            LikeRepository::class
        );

        /**
         * feed
         */

        $this->app->bind(
            FeedRepositoryInterface::class,
            FeedRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        Relation::morphMap([
            'post' => Post::class,
            'comment' => Comment::class,
            'reply' => Reply::class,
        ]);
    }
}
