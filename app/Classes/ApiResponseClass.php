<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;

class ApiResponseClass
{

    /**
     * TODO: add description..
     *
     *
     */
    public static function rollback(
        $e, $message = "Something went wrong..."
    )
    {
        DB:
        self::rollback();
        self::throw($e, $message);
    }

    /**
     * ADD DOCS
     *
     * @param $e
     * @param $message
     * @return mixed
     * @throws \HttpResponseException
     */
    public static function throw(
        $e,
        $message = "Something went wrong..."
    )
    {
        Log::info($e);
        throw new \HttpResponseException(
            response()->json([
                'message' => $message
            ],
                500)
        );
    }


    /**
     * TODO: Add Docs!
     *
     * @param $result
     * @param string $message
     * @param bool $success
     * @param int $code
     * @return JsonResponse
     */
    public static function sendResponse($result, string $message, bool $success = true, int $code = 200): JsonResponse
    {
        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $result,
        ];

        return response()
            ->json($response, $code);
    }
}
