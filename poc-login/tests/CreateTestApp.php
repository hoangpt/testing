<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

/**
 * use function trait (lamda style)
 * @package Tests
 */
trait CreateTestApp
{
    /**
     * Create test application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function CreateApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->loadEnvironmentFrom('.env.ppu');
        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
