<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TokenService
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * List
     */
    public function list()
    {
        $user =  auth('sanctum')->user();

        $tokens = $user->tokens;

        return $tokens;
    }

    /**
     * Create
     */
    public function create($authData)
    {
        $token = [];
        if (Auth::attempt($authData)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token');
        } else {
            
        }

        return $token;
    }

    /**
     * Delete
     */
    public function delete($token = '')
    {
        $user = auth('sanctum')->user();

        if (!$token) {
            //$user->tokens()->delete();
            $user->currentAccessToken()->delete();
        } else {
            $user->tokens()->where('id', $token)->delete();
        }

        return true;
    }
}