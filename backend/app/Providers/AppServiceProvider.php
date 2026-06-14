<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\UserRepository;

use App\Domain\Services\Auth\{PasswordHasherInterface, TokenServiceInterface};
use App\Infrastructure\Services\Auth\{BcryptPasswordHasher, SanctumTokenService};

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
