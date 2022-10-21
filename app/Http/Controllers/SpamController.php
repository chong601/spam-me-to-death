<?php

namespace App\Http\Controllers;

use App\Jobs\SaveRequestData;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpamController extends Controller
{
    public function index(Request $request) {
        SaveRequestData::dispatch($request->ip(), $request->userAgent(), Carbon::now(), json_encode($request->headers));
        return response()->json([
            'ipAddress' => $request->ip(),
            'userAgent' => $request->userAgent(),
            'requestMadeAt' => Carbon::now()->getTimestamp(),
        'headers' => json_encode($request->headers)
        ]);
    }
}
