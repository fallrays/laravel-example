<?php
namespace App\Utils;

use Illuminate\Http\JsonResponse;

trait Response
{
    public function apiResponse($result, $message, $data)
    {
        return new JsonResponse([
            'result' => $result,
            'data'      => $data,
        ], 200);
    }
}