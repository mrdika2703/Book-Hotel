<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_displays_login_page(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('login.index');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_displays_register_page(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('login.register');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_registers_a_new_user(): void
    {
        $data = [
            'username' => 'testuser',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'nama_lengkap' => 'Test User',
            'nama_panggilan' => 'Test',
            'jenis_kelamin' => 'L',
            'email' => 'test@example.com',
            'no_telepon' => '081234567890',
        ];

        $response = $this->post(route('register'), $data);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', [
            'username' => 'testuser',
            'email' => 'test@example.com',
        ]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_logs_in_a_user(): void
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_does_not_log_in_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'username' => 'testuser',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(['username']);
        $this->assertGuest();
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_logs_out_a_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
