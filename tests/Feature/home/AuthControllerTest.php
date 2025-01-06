<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthControllerTest extends TestCase
{
    // use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_login_admin_screen_can_be_rendered(): void
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // $user = User::factory()->create();

        $response = $this->post('/', [
            'username' => 'admin',
            'password' => 'admin123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_username_password(): void
    {
        // $user = User::factory()->create();

        $this->post('/', [
            'username' => 'adminn',
            'password' => 'admin12345',
        ]);

        $this->assertGuest();
    }

    public function test_admin_can_authenticate_using_the_login_screen(): void
    {
        // $user = User::factory()->create();

        $response = $this->post('/admin', [
            'username' => 'admin',
            'password' => 'admin123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_admin_can_not_authenticate_with_invalid_username_password(): void
    {
        // $user = User::factory()->create();

        $this->post('/admin', [
            'username' => 'adminn',
            'password' => 'admin12345',
        ]);

        $this->assertGuest();
    }


    public function test_resepsionis_can_authenticate_using_the_login_screen(): void
    {
        // $user = User::factory()->create();

        $response = $this->post('/admin', [
            'username' => 'rafael',
            'password' => 'admin123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('resepsionis', absolute: false));
    }

    public function test_resepsionis_can_not_authenticate_with_invalid_username_password(): void
    {
        // $user = User::factory()->create();

        $this->post('/admin', [
            'username' => 'adminn',
            'password' => 'admin12345',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        // $user = User::factory()->create();

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_admin_resepsionis_can_logout(): void
    {
        // $user = User::factory()->create();

        $response = $this->post('/logoutadm');

        $this->assertGuest();
        $response->assertRedirect('/admin');
    }
}
