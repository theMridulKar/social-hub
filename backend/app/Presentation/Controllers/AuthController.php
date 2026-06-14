<?php

namespace App\Presentation\Controllers;

use App\Application\DTOs\Auth\{LoginUserDTO,RegisterUserDTO};
use App\Application\UseCases\Auth\{
    LoginUserUseCase,
    LogoutUserUseCase,
    RegisterUserUseCase,
    GetCurrentUserUseCase
};
use App\Presentation\Requests\Auth\{LoginRequest, RegisterRequest};
use App\Presentation\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController
{
    public function register(RegisterRequest $request, RegisterUserUseCase $useCase): JsonResponse {

        $dto = new RegisterUserDTO(
            firstName: $request->first_name,
            lastName: $request->last_name,
            email: $request->email,
            password: $request->password,
        );

        $user = $useCase->execute($dto);

        return response()->json([
            'message' => 'User registered successfully',
            'user'    => new UserResource($user),
        ], 201);
    }

    public function login(LoginRequest $request, LoginUserUseCase $useCase): JsonResponse {

        $dto = new LoginUserDTO(
            email: $request->email,
            password: $request->password,
        );

        $result = $useCase->execute($dto);

        return response()->json([
            'user'  => new UserResource($result['user']),
            'token' => $result['token'],
        ]);
    }

    public function logout(Request $request, LogoutUserUseCase $useCase): JsonResponse {

        $useCase->execute(
            $request->user()->id
        );

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }

    public function me(Request $request, GetCurrentUserUseCase $useCase): JsonResponse {

        $user = $useCase->execute(
            $request->user()->id
        );

        return response()->json([
            'user' => new UserResource($user),
        ]);
    }
}