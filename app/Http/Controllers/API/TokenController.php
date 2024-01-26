<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\TokenAuthRequest;
use App\Services\TokenService;

// 5|VcQcHU4RhwUHqmHl6ZlE34SgIwchD37EN1dv8szO9c253dcf
// 6|DxOiSQIjGfu6XDWdXEf23FRq9k2ORr8cxugJydKB47ae3f7c
class TokenController extends Controller
{
    public $service;

    public function __construct(TokenService $service)
    {
        $this->service = $service;
    }

    /**
     * List
     */
    public function list(Request $request)
    {
        $tokens = $this->service->list($request);

        return response()->json($tokens);
    }

    /**
     * Create
     */
    public function create(Request $request)
    {
        $authData = [
            'email' => $request->header('email'),
            'password' => $request->header('password')
        ];

        $token = $this->service->create($authData);

        return response()->json(['token'=>$token->plainTextToken]);
    }

    /**
     * Delete
     */
    public function delete(Request $reuest)
    {
        $return = $this->service->delete($token);

        return response()->json(['result'=>'success']);
    }
}