<?php

namespace Codtail\AuthStrategy\Tests;

use Illuminate\Support\Facades\Auth;
use Codtail\AuthStrategy\Authenticate;
use Codtail\AuthStrategy\Tests\TestCase;
use Codtail\AuthStrategy\Tests\Utils\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Codtail\AuthStrategy\Contracts\StrategyInterface;
use Codtail\AuthStrategy\Strategies\SessionStrategy;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;

    public $user;
    public $context;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'test user',
            'email' => 'test@site.com',
            'password' => 'password',
            'phone' => '100200300',
        ]);
        $this->context = new Authenticate;
    }

    public function test_set_strategy()
    {
        $this->context->setStrategy(SessionStrategy::class);

        $this->assertInstanceOf(StrategyInterface::class, $this->context->strategy);
    }


    public function test_login_with_session_strategy()
    {
        $this->context->setStrategy(SessionStrategy::class);

        $result = $this->context->login(['email' => 'test@site.com', 'password' => 'password']);

        $this->assertArrayHasKey('data', $result);

        $this->assertArrayHasKey('code', $result);

        $this->assertAuthenticatedAs($this->user);
    }


    // public function test_strategy_with_function()
    // {
    //     $result = Authenticate::setStrategy('session', [
    // 'email' => 'test@site.com',
    // 'password' => 'password'
    //     ]);

    //     assertArrayHasKey('body', $result);

    //     assertArrayHasKey('status_code', $result);

    //     $this->assertAuthenticatedAs($this->user);
    // }
}
