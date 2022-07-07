<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OAT;

class UserController extends ApiController
{
    #[OAT\Get(
        path: '/api/user',
        operationId: 'ApiUserControllerIndex',
        description: 'Get current user',
        summary: 'Get current user',
        tags: ['User'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'User',
                content: new OAT\JsonContent(
                    properties: [
                        new OAT\Property(
                            property: 'success',
                            type: 'boolean',
                            default: true
                        ),
                        new OAT\Property(
                            property: 'data',
                            properties: [
                                new OAT\Property(
                                    property: 'id',
                                    type: 'int'
                                ),
                                new OAT\Property(
                                    property: 'name',
                                    type: 'string'
                                ),
                                new OAT\Property(
                                    property: 'created_at',
                                    type: 'string'
                                ),
                                new OAT\Property(
                                    property: 'updated_at',
                                    type: 'string'
                                ),
                            ],
                            type: 'object'
                        ),
                    ]
                )
            ),
            new OAT\Response(response: 401, description: 'Unauthenticated'),
            new OAT\Response(response: 403, description: 'Forbidden'),
        ]
    )]
    public function index(Request $request): JsonResponse
    {
        return $this->success($request->user());
    }
}
