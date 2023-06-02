<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_user_can_login_with_correct_credentials()
    {
        $response = $this->post('/api/v1/auth/login', [
            'mobile' => '09386309327',
            'password' => '123456',
        ]);

        $response->assertStatus(200);
    }
}
