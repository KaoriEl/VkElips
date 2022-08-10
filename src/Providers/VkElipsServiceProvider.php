<?php

namespace Kaoriel\Vkelips\Providers;

use Illuminate\Support\ServiceProvider;
use Kaoriel\Vkelips\Console\Commands\VkElipsCommand;

class VkElipsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../../config/vkelips.php' => config_path('vkelips.php'),
            ]);
        }
    }

}