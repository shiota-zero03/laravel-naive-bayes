<?php

namespace App\Resources\Responses;

class ApiResponse
{
    public function successResponse($message, $data, $kode)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $kode);
    }
    public function errorResponse($message, $kode)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $kode);
    }
}