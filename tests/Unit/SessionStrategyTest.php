<?php

namespace Codtail\AuthStrategy\Tests;

use Illuminate\Support\Facades\Auth;
use Codtail\AuthStrategy\Authenticate;
use Codtail\AuthStrategy\Tests\TestCase;
use Codtail\AuthStrategy\Tests\Utils\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Codtail\AuthStrategy\Contracts\StrategyInterface;
use Codtail\AuthStrategy\Strategies\SessionStrategy;
use Illuminate\Validation\ValidationException;

class SessionStrategyTest extends TestCase
{
    use RefreshDatabase;

    public $user;

    public $strategy;

    public $result;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'test user',
            'email' => 'test@site.com',
            'password' => 'password',
            'phone' => '100200300',
        ]);

        $this->strategy = new SessionStrategy;
    }

    public function test_login_from_session_strategy()
    {
        $this->strategy->login(['email' => 'test@site.com', 'password' => 'password']);
     
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_login_with_wrong_credentials()
    {
        $this->expectException(ValidationException::class);

        $this->strategy->login(['email' => 'test@site.com', 'password' => '123']);
    }


   

}
