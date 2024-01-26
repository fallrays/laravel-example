<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Services\UserService;
use App\DTO\UserDTO;

class UserController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Register
     */
    public function register()
    {
        return view('user.register', []);
    }

    /**
     * Register Create
     */
    public function create(UserRegisterRequest $request)
    {
        // Set Data
        $userDTO = new UserDTO(
            '',
            $request->name,
            $request->email,
            Hash::make($request->password),
            $request->hp,
            '',
            ''
        );
        $result = $this->service->create($userDTO);

        return redirect("/user/login");
    }

    /**
     * Login
     */
    public function login()
    {
        if (Auth::id()) {
            return redirect('/board');
        }
        return view('user.login', []);
    }

    /**
     * Login Auth
     */
    public function authenticate(UserLoginRequest $request)
    {
        $return = $this->service->auth($request);

        if ($return === true) {
            return redirect()->intended('/board');
        } else {
            return back()->withErrors([
                'email' => '이메일 또는 비밀번호가 맞지않습니다',
            ])->onlyInput('email');
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }
}