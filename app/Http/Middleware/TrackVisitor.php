<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');

        $visitor = Visitor::where('ip_address', $ipAddress)->whereBetween('visit_date', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->first();

        if (!$visitor) {
            Visitor::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'visit_date' => now(),
            ]);
        }

        return $next($request);
    }
}
