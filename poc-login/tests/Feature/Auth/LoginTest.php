<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
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


    /**
     * Test user can go to login page (public page)
     * @test
     * @author hoang.pt
     */
    public function test_LGx01x01_user_can_view_login_form()
    {
        //step-1: landed at '/login' url
        $response = $this->get(route('login'));

        //assert get status=200 and route code=auth.login (blackbox)
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Test user can not view login page if have session
     * @test
     * @author hoang.pt
     */
    public function test_LGx01x02_user_cannot_view_login_form_when_authenticated()
    {
        //step-1: Create 1 fake user and mock user in session
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get(route('login'));

        //assert that redirect to
        $response->assertRedirect(route('dashboard'));
    }

    /**
     * Test user can login with correct credential
     * @author hoang.pt
     */
    public function test_LGx02x01_user_can_login_with_corect_credentials()
    {
        //step-1: mock User in database
        $user = factory(User::class)->create([
            'name' => 'Phan Hoang',
            'email' => 'hoang.pt@teko.vn',
            'password' => Hash::make($password = '123456789'),
        ]);

        //step-2: using this to post (using php-curl)
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        //assert can redirect and session contain correct data
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test user can login with correct credential
     * @author hoang.pt
     */
    public function test_LGx02x01_user_can_login_with_corect_credentials_datastub()
    {
        //step-1: mock User in database
        $data = json_decode(file_get_contents("tests/stubs/user.json"));

        $user = factory(User::class)->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($password = $data->password),
        ]);

        //step-2: using this to post (using php-curl)
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        //assert can redirect and session contain correct data
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test user can login with correct credential
     * @author hoang.pt
     */
    public function test_LGx02x01_user_can_login_with_corect_credentials_datafake()
    {
        //step-1: mock User in database
        $user = factory(User::class)->create();

        //step-2: using this to post (using php-curl)
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '1234567890',
        ]);

        //assert can redirect and session contain correct data
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * @author hoang.pt
     */
    public function test_LGx02x02_user_cannot_login_with_incorrect_password()
    {
        //step01- create user in database
        $user = factory(User::class)->create([
            'password' => Hash::make('123456789'),
        ]);

        $response = $this->from(route('login'))->post(route('login'), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * @author hoang.pt
     */
    public function test_LGx02x03_user_cannot_login_with_email_notexist()
    {
        $response = $this->from(route('login'))->post(route('login'), [
            'email' => 'nobody@example.com',
            'password' => '123456',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
