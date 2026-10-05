<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'acara21_admin' => \App\Http\Middleware\Acara21Admin::class,
            'acara21_cek_role' => \App\Http\Middleware\Acara21CekRole::class,
            'role' => RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function ($exceptions): void {
        //
    })->create();
