<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_authenticated_users_can_access_profil_routes()
    {
        // Testing unauthorized access
        $response = $this->get(route('profil.index'));
        $response->assertRedirect(route('login'));

        $response = $this->post(route('profil.update', ['id' => 1]));
        $response->assertRedirect(route('login'));

        $response = $this->post(route('profil.change_password', ['id' => 1]));
        $response->assertRedirect(route('login'));

        $response = $this->delete(route('profil.delete_account', ['id' => 1]));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_view_their_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('profil.index'));

        $response->assertStatus(200);
        $response->assertViewIs('profil.index'); // Pastikan view yang dikembalikan sesuai
    }

    /** @test */
    public function user_can_update_their_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('profil.update', $user->id), [
            'username' => 'newusername',
            'nama_lengkap' => 'New Full Name',
            'email' => 'newemail@example.com',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'username' => 'newusername',
            'nama_lengkap' => 'New Full Name',
            'email' => 'newemail@example.com',
        ]);
    }

    /** @test */
    public function user_can_change_their_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->actingAs($user)->post(route('profil.change_password', $user->id), [
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect();
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    /** @test */
    public function user_can_delete_their_account()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('profil.delete_account', $user->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
