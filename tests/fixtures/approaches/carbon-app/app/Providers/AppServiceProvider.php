<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Heritage\Support\Facades\Date;
use Heritage\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Date::use(CarbonImmutable::class);
    }
}
