<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('login', function (Request $request) {
            $key = optional($request->input('email'))->toString() ?? $request->ip();
            $maxAttempts = 3;
            $lockoutDuration = 300;

            if (RateLimiter::tooManyAttempts($key, $maxAttempts)) {
                $remainingSeconds = RateLimiter::availableIn($key);
                $remainingMinutes = Carbon::now()->diffInMinutes(Carbon::now()->addSeconds($remainingSeconds));
                return response()->json([
                    'status' => false,
                    'message' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$remainingMinutes} menit.",
                ], 429);
            }
            RateLimiter::hit($key, $lockoutDuration);
            return null;
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
