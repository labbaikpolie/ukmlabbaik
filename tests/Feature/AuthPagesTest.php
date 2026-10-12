<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_and_registration_use_the_labbaik_auth_design(): void
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('auth-theme.css')
            ->assertSee('Lupa password?');

        $this->get('/register')
            ->assertOk()
            ->assertSee('auth-theme.css')
            ->assertSee('Buat akun baru')
            ->assertSee('name="password_confirmation"', false)
            ->assertSee('data-password-toggle', false)
            ->assertSee('auth-password-toggle', false);
    }

    public function test_password_reset_flow_is_available_and_uses_the_auth_design(): void
    {
        $this->get('/password/reset')
            ->assertOk()
            ->assertSee('auth-theme.css')
            ->assertSee('name="email"', false);

        $this->get('/password/reset/test-token')
            ->assertOk()
            ->assertSee('Atur ulang password')
            ->assertSee('name="token"', false)
            ->assertSee('data-password-toggle', false);
    }

    public function test_registration_creates_an_account(): void
    {
        $email = Str::uuid() . '@example.test';

        $this->post('/register', [
            'name' => 'Labbaik Test',
            'email' => $email,
            'password' => 'SecurePass123!',
            'password_confirmation' => 'SecurePass123!',
        ])
            ->assertRedirect('/admin')
            ->assertSessionHasNoErrors();

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function test_password_reset_request_sends_a_reset_notification(): void
    {
        Notification::fake();
        $user = User::factory()->create([
            'password' => Hash::make('CurrentPass123!'),
        ]);

        $this->post('/password/email', ['email' => $user->email])
            ->assertRedirect()
            ->assertSessionHas('status');

        Notification::assertSentTo($user, ResetPassword::class);
    }
}
