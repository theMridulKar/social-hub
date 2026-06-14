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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
