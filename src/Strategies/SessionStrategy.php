<?php

namespace Codtail\AuthStrategy\Strategies;

use Illuminate\Support\Facades\Auth;
use Codtail\AuthStrategy\Contracts\StrategyInterface;
use Illuminate\Validation\ValidationException;

class SessionStrategy implements StrategyInterface
{
    public function login(array $credentials)
    {
        if(!Auth::attempt($credentials)) 
            throw ValidationException::withMessages([]);
    }
}