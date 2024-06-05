<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RenterRegistrationTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_renter_registration_page_can_be_viewed(): void
    {
        $response = $this->get(route('renter-registration'));

        $response->assertStatus(200);
    }

    public function test_renter_registration_submitted(): void
    {
        $this->seed(DatabaseSeeder::class);

       $response = $this->post(route('renter-registration.post'), [
            'name' => 'Test User',
            'email' => 'test3654@gmail.com',
            'mobile' => '0776523256',
            'address' => 'No 32, Colombo Road, Colombo 07',
            'password' => 'password',
            'password_confirmation' => 'password',
            'checkbox' => "true"
           ]);

       $this->assertAuthenticated();
       $response->assertRedirectToRoute('dashboard');

    }
}
