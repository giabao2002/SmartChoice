<?php

namespace App\Modules\Momo;

use Illuminate\Support\ServiceProvider;

class MomoProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/configs/momo.php', 'momo');
    }
}
