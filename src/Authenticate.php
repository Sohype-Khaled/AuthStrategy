<?php

namespace Codtail\AuthStrategy;

use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public $strategy;

    public function setStrategy(string $strategy)
    {
        $this->strategy = new $strategy;
        return $this;
    }

    public function login($credentials)
    {
        $this->strategy->login($credentials);

        return ['data' => [], 'code' => 200];
    }

    // public static function with(string $strategy, array $credentials = []): array
    // {
    //     return (new self())->setStrategy($strategy)->execute($credentials);
    // }
}
