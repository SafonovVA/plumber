<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use stdClass;
use OpenApi\Attributes as OAT;

#[OAT\Info(
    version: '1.0.0',
    description: 'Test api',
    title: 'Test-Api documentation'
)]
#[OAT\Server(url: 'http://localhost:82', description: 'Container Server')]
abstract class ApiController extends Controller
{
    protected function success(
        array|object|string $data = null,
        string $message = null,
        int $code = 200
    ): JsonResponse {
        $result = ['success' => true];
        $data === null ?: $result['data'] = $data;
        $message === null ?: $result['message'] = $message;

        return response()->json($result, $code);
    }

    protected function error(string $message, int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}
