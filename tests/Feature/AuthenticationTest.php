<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     *
     * @return void
     */
    public function test_successful_login()
    {
      
        $user = User::factory()->create([
            'password' => bcrypt('password123') 
        ]);

       
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password123'
        ]);

        
        $response->assertStatus(200); 

      
        $response->assertJsonStructure([
            'token'
        ]);
    }

    /**
     * 
     *
     * @return void
     */
    public function test_unsuccessful_login()
    {
        
        $response = $this->postJson('/api/login', [
            'email' => 'nonexistentuser@example.com',
            'password' => 'wrongpassword'
        ]);

      
        $response->assertStatus(401); 

        
        $response->assertJson([
            'message' => 'Unauthorized'
        ]);
    }
}
