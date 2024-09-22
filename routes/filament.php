<?php

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Http\Middleware\MirrorConfigToSubpackages;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

Filament\Facades\Filament::serving(function () {
    // ...
});

Route::prefix(config('filament.path'))
    ->middleware([
        'web',
        Authenticate::class,
        DispatchServingFilamentEvent::class,
        MirrorConfigToSubpackages::class,
    ])
    ->group(function () {
        // ...
    });