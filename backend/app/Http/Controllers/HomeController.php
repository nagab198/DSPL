<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function home($id): JsonResponse
    {
        return response()->json(['response' => 'calling ' . $id]);
    }
}
