<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class BingoController extends Controller
{
    public function validateNumber(NumberRequest $request): JsonResponse
    {
        if (isset($request->number)) {
            $calledNumbers = Cache::get('called_numbers', []);

            return response()->json(['validate' => in_array($request->number, $calledNumbers)]);
        }
        return response()->json(['validate' => false]);
    }
}
