<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_logs_in_user_and_redirects_to_otp()
    {
        $user = User::factory()->create([
            'email' => 'o.bouysfi@byteit.ma',
            'password' => bcrypt('Byteit2024@'),
        ]);

        $response = $this->post('/login/password', [
            'email' => 'o.bouysfi@byteit.ma',
            'password' => 'Byteit2024@',
        ]);

        $response->assertRedirect('/otp');

        $this->assertTrue(Auth::check());

        $user->refresh();
        $this->assertNotNull($user->otp_code);
        $this->assertNotNull($user->otp_expires_at);
    }
}
