<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveScoreRequest;
use App\Repositories\PlayerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PlayerController extends Controller
{
    private PlayerRepository $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    public function saveScore(SaveScoreRequest $request): JsonResponse
    {
        if (count(array_diff($request->get('numbers'), Cache::get('called_numbers', []))) > 0) {
            return response()->json(['error' => 'The card is not completed!']);
        }

        try {
            $score = abs(100 - count(Cache::get('called_numbers', [])));
            $this->playerRepository->create([
                'name' => $request->get('name'),
                'score' => $score
            ]);

            return response()->json(['message' => 'The card is completed and the score is saved!', 'score' => $score]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Something went wrong!']);
        }
    }

    public function getRanking(): JsonResponse
    {
        try {
            return response()->json(['ranking' => $this->playerRepository->playerRanking()]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Something went wrong!']);
        }
    }
}
