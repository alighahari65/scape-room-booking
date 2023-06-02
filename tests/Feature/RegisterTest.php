<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     public function test_new_users_can_register()
    {
        $response = $this->post('/api/v1/auth/register', [
            'fullName' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'mobile' => '09113242091',
            'birthday' => '1980-01-01'
        ]);

        $response->assertStatus(201);
    }
}
