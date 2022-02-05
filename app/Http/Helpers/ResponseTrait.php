<?php

namespace App\Http\Helpers;

use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * @param $message
     * @param null $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function invalidResponse($message, $code = null)
    {
        return response()->json([
            'status' => $code,
            'message' => $message
        ], $code);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function validResponseWithData($data)
    {
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message)
    {
        return response()->json([
            'status' => 200,
            'message' => $message
        ], Response::HTTP_OK);
    }
    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message)
    {
        return response()->json([
            'status' => Response::HTTP_BAD_REQUEST,
            'message' => $message
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataResponse($data)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $data
        ], Response::HTTP_OK);
    }
}
