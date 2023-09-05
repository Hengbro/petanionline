<?php

namespace App\Http;
use Illuminate\Http\JsonResponse;

trait Helper{
    public function success($data, $message = "success"):JsonResponse{
        return response()->json([
            'code' =>200,
            'message'=> $message,
            'data' => $data
        ]);
    }

    public function error($message):JsonResponse{
        return response()->json([
            'code' =>400,
            'message'=> $message,
        ], 400);
    }

    public function generateToken(): string{
        $alfabet = "abcdefghijklmnopqrstuvwxyz";
        $alfabetKapital = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numerik = "1234567890";
        $allCart = $alfabet . $alfabetKapital . $numerik;
        return substr(str_shuffle($allCart), 0, 60);
    }
}
