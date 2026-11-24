<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Register a new user.
     */
    public function register(array $data): array
    {
        // Check whether email already exists.
        $existingUser = $this->authRepository->findByEmail(
            $data['email']
        );

        if ($existingUser) {
            throw ValidationException::withMessages([
                'email' => ['Email address already exists.'],
            ]);
        }

        // Create user in database.
        $user = $this->authRepository->createUser([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => 'active',
        ]);

        // Generate JWT token.
        $token = auth('api')->login($user);

        return [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    /**
     * Authenticate an existing user.
     */
    public function login(array $credentials): array
    {
        // Find user by email.
        $user = $this->authRepository->findByEmail(
            $credentials['email']
        );

        // Check user and password.
        if (!$user || !Hash::check(
            $credentials['password'],
            $user->password
        )) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password.'],
            ]);
        }

        // Check account status.
        if ($user->status !== 'active') {
            throw ValidationException::withMessages([
                'email' => ['Your account is inactive.'],
            ]);
        }

        // Generate JWT token.
        $token = auth('api')->login($user);

        return [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
    }

    /**
     * Get authenticated user.
     */
    public function getAuthenticatedUser(): ?User
    {
        return auth('api')->user();
    }

    /**
     * Logout and invalidate JWT token.
     */
    public function logout(): void
    {
        auth('api')->logout();
    }
}
