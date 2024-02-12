<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class AdminBingoController extends Controller
{

    public function index(): View
    {
        $calledNumbers = Cache::get('called_numbers', []);

        return view('welcome', compact('calledNumbers'));
    }


    public function callNextNumber(): RedirectResponse
    {
        $calledNumbers = Cache::get('called_numbers', []);

        if (count($calledNumbers) < 100) {

            $nextNumber = rand(1, 100);
            while (in_array($nextNumber, $calledNumbers)) {
                $nextNumber = rand(1, 100);
            }

            $calledNumbers[] = $nextNumber;
            Cache::put('called_numbers', $calledNumbers);
        }

        return redirect()->back();
    }

    public function resetBingo(): RedirectResponse
    {
        Cache::forget('called_numbers');

        return redirect()->back();
    }
}
