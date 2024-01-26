<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;
use App\DTO\UserDTO;

class UserService
{
    public $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Create
     */
    public function create(UserDTO $user)
    {
        $data = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'hp' => $user->getHp()
        ];

        return $this->repo->create($data);
    }

    /**
     * Get Info
     */
    public function getUser($id): UserDTO
    {
        $user = $this->repo->findById($id);

        $userDTO = new UserDTO(
            $user['id'],
            $user['name'],
            $user['email'],
            $user['password'],
            $user['hp'],
            $user['created_at'],
            $user['updated_at']
        );

        return $userDTO;
    }

    /**
     * Update
     */
    public function update(UserDTO $user): bool
    {
        $data = [
            'name' => $user->getName(),
            'hp' => $user->getHp()
        ];

        return $this->repo->update($user->getId(), $data);
    }

    /**
     * Password Update
     */
    public function updatePassword($password)
    {

    }

    /**
     * Login Auth
     */
    public function auth($request): bool
    {
        $data = [
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete
     */
    public function delete($id): bool
    {
        return $this->repo->delete($id);
    }
}