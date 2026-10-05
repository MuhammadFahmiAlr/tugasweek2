<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Acara21CekRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        $role = $role ?? $request->route('role');
        if ($request->user() && $request->user()->role !== $role) {
            return response()->json(['message' => 'Akses ditolak!'], 403);
        }
        return $next($request);
    }

    public function terminate($request, $response)
    {
        Log::info('Request selesai', ['url' => $request->fullUrl()]);
    }
}
