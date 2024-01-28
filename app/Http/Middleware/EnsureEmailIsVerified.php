<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Resources\Responses\ApiResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use Auth;

class EnsureEmailIsVerified
{
    private $response;
    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
    }

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
