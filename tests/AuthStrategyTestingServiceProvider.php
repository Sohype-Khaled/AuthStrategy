<?php

namespace Codtail\AuthStrategy\Tests;

use Illuminate\Support\ServiceProvider;

class AuthStrategyTestingServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    $this->loadMigrationsFrom(__DIR__ . '/Utils/database/migrations');
  }
}
