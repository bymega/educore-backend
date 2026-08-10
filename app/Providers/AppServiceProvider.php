<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        \App\Repositories\Interface\AuthRepositoryInterface::class => \App\Repositories\Eloquent\AuthRepository::class,
        \App\Repositories\Interface\UserRepositoryInterface::class => \App\Repositories\Eloquent\UserRepository::class,
        \App\Repositories\Interface\TeacherRepositoryInterface::class => \App\Repositories\Eloquent\TeacherRepository::class,
        \App\Repositories\Interface\StudentRepositoryInterface::class =>
        \App\Repositories\Eloquent\StudentRepository::class,
    ];



    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request): Limit {
            $email = Str::lower((string) $request->input('email'));

            return Limit::perMinute(5)->by($email . '|' . $request->ip());
        });
    }
}
