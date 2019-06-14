<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_user_can_logout()
    {
        $this->be(factory(User::class)->create());
        $response = $this->post(route('logout'));

        $response->assertRedirect(route('/'));
        $this->assertGuest();
    }

    public function test_user_can_not_logout_if_notauthenticated()
    {
        $response = $this->post(route('logout'));

        $response->assertRedirect(route('/'));
        $this->assertGuest();
    }
}
